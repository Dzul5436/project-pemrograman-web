<?php
session_start();
require_once '../koneksi.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pengajuan_id = (int)$_POST['pengajuan_id'];
    $action = $_POST['action'];
    $catatan_admin = mysqli_real_escape_string($koneksi, $_POST['catatan_admin'] ?? '');
    
    if ($action === 'approve') {
        // Ambil data pengajuan
        $query_pengajuan = "SELECT * FROM pengajuan_event WHERE id = $pengajuan_id";
        $result_pengajuan = mysqli_query($koneksi, $query_pengajuan);
        $pengajuan = mysqli_fetch_assoc($result_pengajuan);
        
        if ($pengajuan) {
            // Insert ke tabel events
            $query_insert = "INSERT INTO events (
                judul, deskripsi, kategori_id, tanggal_mulai, tanggal_selesai,
                waktu_mulai, waktu_selesai, lokasi, alamat_lengkap, tipe_event,
                link_meeting, kuota, biaya, benefit, poster, link_pendaftaran,
                batas_pendaftaran, status, catatan_admin, user_id, created_at
            ) VALUES (
                '{$pengajuan['judul']}', '{$pengajuan['deskripsi']}', {$pengajuan['kategori_id']},
                '{$pengajuan['tanggal_mulai']}', '{$pengajuan['tanggal_selesai']}',
                '{$pengajuan['waktu_mulai']}', '{$pengajuan['waktu_selesai']}',
                '{$pengajuan['lokasi']}', '{$pengajuan['alamat_lengkap']}', '{$pengajuan['tipe_event']}',
                '{$pengajuan['link_meeting']}', {$pengajuan['kuota']}, {$pengajuan['biaya']},
                '{$pengajuan['benefit']}', '{$pengajuan['poster']}', '{$pengajuan['link_pendaftaran']}',
                '{$pengajuan['batas_pendaftaran']}', 'upcoming', '$catatan_admin',
                {$pengajuan['user_id']}, NOW()
            )";
            
            if (mysqli_query($koneksi, $query_insert)) {
                // Update status pengajuan
                $query_update = "UPDATE pengajuan_event SET status = 'disetujui', catatan_admin = '$catatan_admin', updated_at = NOW() WHERE id = $pengajuan_id";
                mysqli_query($koneksi, $query_update);
                
                // Kirim notifikasi ke user
                $notif_query = "INSERT INTO notifikasi (user_id, judul, pesan, tipe, created_at) 
                                VALUES ({$pengajuan['user_id']}, 'Event Disetujui!', 'Pengajuan event \"{$pengajuan['judul']}\" telah disetujui oleh admin.', 'success', NOW())";
                mysqli_query($koneksi, $notif_query);
                
                $success = 'Event berhasil disetujui!';
            }
        }
    } elseif ($action === 'reject') {
        // Update status pengajuan menjadi ditolak
        $query_update = "UPDATE pengajuan_event SET status = 'ditolak', catatan_admin = '$catatan_admin', updated_at = NOW() WHERE id = $pengajuan_id";
        
        if (mysqli_query($koneksi, $query_update)) {
            // Ambil data pengajuan untuk notifikasi
            $query_pengajuan = "SELECT * FROM pengajuan_event WHERE id = $pengajuan_id";
            $result_pengajuan = mysqli_query($koneksi, $query_pengajuan);
            $pengajuan = mysqli_fetch_assoc($result_pengajuan);
            
            // Kirim notifikasi ke user
            $notif_query = "INSERT INTO notifikasi (user_id, judul, pesan, tipe, created_at) 
                            VALUES ({$pengajuan['user_id']}, 'Event Ditolak', 'Pengajuan event \"{$pengajuan['judul']}\" ditolak. Alasan: $catatan_admin', 'error', NOW())";
            mysqli_query($koneksi, $notif_query);
            
            $success = 'Event berhasil ditolak!';
        }
    } elseif ($action === 'revision') {
        // Update status pengajuan menjadi perlu revisi
        $query_update = "UPDATE pengajuan_event SET status = 'revisi', catatan_admin = '$catatan_admin', updated_at = NOW() WHERE id = $pengajuan_id";
        
        if (mysqli_query($koneksi, $query_update)) {
            $query_pengajuan = "SELECT * FROM pengajuan_event WHERE id = $pengajuan_id";
            $result_pengajuan = mysqli_query($koneksi, $query_pengajuan);
            $pengajuan = mysqli_fetch_assoc($result_pengajuan);
            
            $notif_query = "INSERT INTO notifikasi (user_id, judul, pesan, tipe, created_at) 
                            VALUES ({$pengajuan['user_id']}, 'Revisi Diperlukan', 'Pengajuan event \"{$pengajuan['judul']}\" memerlukan revisi. Catatan: $catatan_admin', 'warning', NOW())";
            mysqli_query($koneksi, $notif_query);
            
            $success = 'Permintaan revisi berhasil dikirim!';
        }
    }
}

// Ambil ID pengajuan dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Query untuk mendapatkan detail pengajuan event
$query = "SELECT pe.*, k.nama_kategori, k.icon, k.warna, u.nama as nama_pengaju, u.email as email_pengaju
          FROM pengajuan_event pe
          LEFT JOIN kategori_event k ON pe.kategori_id = k.id
          LEFT JOIN users u ON pe.user_id = u.id
          WHERE pe.id = $id";
$result = mysqli_query($koneksi, $query);
$event = mysqli_fetch_assoc($result);

if (!$event) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Pengajuan - SIM-Event Kampus</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#2563eb',
            secondary: '#1e40af',
            accent: '#f59e0b',
            dark: '#1e293b',
          }
        }
      }
    }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
  <?php include 'sidebar.php'; ?>

  <!-- Main Content -->
  <main class="lg:ml-64">
    <!-- Top Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-30">
      <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-4">
          <button class="lg:hidden text-gray-600">
            <i class="fas fa-bars text-xl"></i>
          </button>
          <div>
            <h1 class="text-xl font-bold text-dark">Review Pengajuan Event</h1>
            <p class="text-sm text-gray-500">Detail pengajuan dari panitia</p>
          </div>
        </div>
        <a href="dashboard.php" class="text-gray-600 hover:text-primary flex items-center gap-2">
          <i class="fas fa-arrow-left"></i> Kembali
        </a>
      </div>
    </header>

    <!-- Review Content -->
    <div class="p-6">
      <div class="max-w-4xl">
        <?php if ($success): ?>
        <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-6 flex items-center gap-3">
          <i class="fas fa-check-circle text-green-500"></i>
          <span class="text-green-700"><?= $success ?></span>
        </div>
        <?php endif; ?>

        <!-- Status Banner -->
        <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-6 flex items-center justify-between">
          <div class="flex items-center gap-3">
            <i class="fas fa-clock text-amber-500 text-xl"></i>
            <div>
              <p class="font-semibold text-dark">
                <?php
                switch ($event['status']) {
                    case 'menunggu': echo 'Menunggu Persetujuan'; break;
                    case 'disetujui': echo 'Disetujui'; break;
                    case 'ditolak': echo 'Ditolak'; break;
                    case 'revisi': echo 'Perlu Revisi'; break;
                }
                ?>
              </p>
              <p class="text-sm text-gray-600">Diajukan oleh <?= htmlspecialchars($event['organisasi']) ?> pada <?= date('d M Y, H:i', strtotime($event['created_at'])) ?></p>
            </div>
          </div>
          <span class="px-4 py-2 bg-amber-100 text-amber-700 text-sm font-medium rounded-full"><?= ucfirst($event['status']) ?></span>
        </div>

        <!-- Event Details -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
          <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
            <i class="fas fa-info-circle text-primary"></i> Detail Event yang Diajukan
          </h2>
          
          <!-- Event Header -->
          <div class="flex flex-col md:flex-row gap-6 mb-6">
            <div class="w-full md:w-64 h-40 bg-gray-100 rounded-xl flex items-center justify-center overflow-hidden">
              <?php if ($event['poster']): ?>
              <img src="../uploads/posters/<?= $event['poster'] ?>" alt="Event Poster" class="w-full h-full object-cover">
              <?php else: ?>
              <i class="fas fa-image text-4xl text-gray-400"></i>
              <?php endif; ?>
            </div>
            <div class="flex-1">
              <span class="px-3 py-1 bg-blue-100 text-primary text-xs font-medium rounded-full"><?= htmlspecialchars($event['nama_kategori']) ?></span>
              <h3 class="text-2xl font-bold text-dark mt-2"><?= htmlspecialchars($event['judul']) ?></h3>
              <p class="text-gray-600 mt-2"><?= htmlspecialchars($event['deskripsi']) ?></p>
              
              <div class="flex flex-wrap gap-4 mt-4">
                <div class="flex items-center gap-2 text-sm text-gray-600">
                  <i class="fas fa-building text-primary"></i>
                  <span><?= htmlspecialchars($event['organisasi']) ?></span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                  <i class="fas fa-map-marker-alt text-red-500"></i>
                  <span><?= ucfirst($event['tipe_event']) ?></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <h4 class="font-semibold text-dark mb-3">Waktu & Tempat</h4>
              <div class="space-y-2 text-sm">
                <div class="flex items-center gap-3">
                  <i class="fas fa-calendar text-gray-400 w-5"></i>
                  <span class="text-gray-600"><?= date('d F Y', strtotime($event['tanggal_mulai'])) ?></span>
                </div>
                <div class="flex items-center gap-3">
                  <i class="fas fa-clock text-gray-400 w-5"></i>
                  <span class="text-gray-600"><?= $event['waktu_mulai'] ?> - <?= $event['waktu_selesai'] ?> WIB</span>
                </div>
                <div class="flex items-center gap-3">
                  <i class="fas fa-map-marker-alt text-gray-400 w-5"></i>
                  <span class="text-gray-600"><?= htmlspecialchars($event['lokasi']) ?></span>
                </div>
                <div class="flex items-center gap-3">
                  <i class="fas fa-hourglass-end text-gray-400 w-5"></i>
                  <span class="text-gray-600">Batas Daftar: <?= date('d M Y', strtotime($event['batas_pendaftaran'])) ?></span>
                </div>
              </div>
            </div>
            
            <div>
              <h4 class="font-semibold text-dark mb-3">Kuota & Biaya</h4>
              <div class="space-y-2 text-sm">
                <div class="flex items-center gap-3">
                  <i class="fas fa-users text-gray-400 w-5"></i>
                  <span class="text-gray-600">Kuota: <?= $event['kuota'] ?> peserta</span>
                </div>
                <div class="flex items-center gap-3">
                  <i class="fas fa-ticket-alt text-gray-400 w-5"></i>
                  <span class="text-gray-600">Biaya: <?= $event['biaya'] > 0 ? 'Rp ' . number_format($event['biaya'], 0, ',', '.') : 'Gratis' ?></span>
                </div>
              </div>
              
              <?php if ($event['benefit']): ?>
              <h4 class="font-semibold text-dark mt-4 mb-3">Benefit</h4>
              <div class="flex flex-wrap gap-2">
                <?php foreach (explode(',', $event['benefit']) as $benefit): ?>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full"><?= htmlspecialchars($benefit) ?></span>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <!-- Contact Person -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
          <h2 class="text-lg font-bold text-dark mb-4 flex items-center gap-2">
            <i class="fas fa-user text-green-500"></i> Penanggung Jawab
          </h2>
          
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
              <span class="font-bold text-primary text-lg"><?= strtoupper(substr($event['nama_pic'], 0, 2)) ?></span>
            </div>
            <div>
              <p class="font-semibold text-dark"><?= htmlspecialchars($event['nama_pic']) ?></p>
              <p class="text-sm text-gray-500">Ketua Panitia - <?= htmlspecialchars($event['organisasi']) ?></p>
              <div class="flex items-center gap-4 mt-2 text-sm">
                <span class="text-gray-600"><i class="fas fa-phone mr-2"></i><?= htmlspecialchars($event['no_hp_pic']) ?></span>
                <span class="text-gray-600"><i class="fas fa-envelope mr-2"></i><?= htmlspecialchars($event['email_pic']) ?></span>
              </div>
            </div>
          </div>
        </div>

        <?php if ($event['status'] === 'menunggu'): ?>
        <!-- Admin Action Form -->
        <form method="POST" action="">
          <input type="hidden" name="pengajuan_id" value="<?= $event['id'] ?>">
          
          <!-- Admin Notes -->
          <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
            <h2 class="text-lg font-bold text-dark mb-4 flex items-center gap-2">
              <i class="fas fa-sticky-note text-amber-500"></i> Catatan Admin
            </h2>
            
            <textarea name="catatan_admin" rows="4" placeholder="Tambahkan catatan untuk pengaju (opsional)..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition resize-none"></textarea>
          </div>

          <!-- Action Buttons -->
          <div class="flex flex-col sm:flex-row gap-4">
            <button type="submit" name="action" value="approve" class="flex-1 py-4 bg-green-500 text-white rounded-xl font-bold hover:bg-green-600 transition flex items-center justify-center gap-2">
              <i class="fas fa-check-circle"></i> Setujui Event
            </button>
            <button type="submit" name="action" value="reject" class="flex-1 py-4 bg-red-500 text-white rounded-xl font-bold hover:bg-red-600 transition flex items-center justify-center gap-2">
              <i class="fas fa-times-circle"></i> Tolak Event
            </button>
            <button type="submit" name="action" value="revision" class="px-8 py-4 bg-amber-500 text-white rounded-xl font-bold hover:bg-amber-600 transition flex items-center justify-center gap-2">
              <i class="fas fa-edit"></i> Minta Revisi
            </button>
          </div>
        </form>
        <?php endif; ?>
      </div>
    </div>
  </main>
</body>
</html>
