<?php
session_start();
require_once '../koneksi.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$stats = [];

// Jumlah pengajuan menunggu
$query_pending = "SELECT COUNT(*) as total FROM pengajuan_event WHERE status = 'menunggu'";
$stats['pending'] = mysqli_fetch_assoc(mysqli_query($koneksi, $query_pending))['total'];

// Jumlah event disetujui
$query_approved = "SELECT COUNT(*) as total FROM events";
$stats['approved'] = mysqli_fetch_assoc(mysqli_query($koneksi, $query_approved))['total'];

// Jumlah pengajuan ditolak bulan ini
$query_rejected = "SELECT COUNT(*) as total FROM pengajuan_event WHERE status = 'ditolak' AND MONTH(created_at) = MONTH(NOW())";
$stats['rejected'] = mysqli_fetch_assoc(mysqli_query($koneksi, $query_rejected))['total'];

// Jumlah event sedang berlangsung
$query_ongoing = "SELECT COUNT(*) as total FROM events WHERE tanggal_mulai <= CURDATE() AND tanggal_selesai >= CURDATE()";
$stats['ongoing'] = mysqli_fetch_assoc(mysqli_query($koneksi, $query_ongoing))['total'];

// Query pengajuan event terbaru
$query_recent = "SELECT pe.*, k.nama_kategori, k.icon, k.warna, u.nama as nama_pengaju
                 FROM pengajuan_event pe
                 LEFT JOIN kategori_event k ON pe.kategori_id = k.id
                 LEFT JOIN users u ON pe.user_id = u.id
                 WHERE pe.status = 'menunggu'
                 ORDER BY pe.created_at DESC
                 LIMIT 5";
$result_recent = mysqli_query($koneksi, $query_recent);

// Query event yang baru disetujui
$query_approved_recent = "SELECT e.*, k.nama_kategori
                          FROM events e
                          LEFT JOIN kategori_event k ON e.kategori_id = k.id
                          ORDER BY e.created_at DESC
                          LIMIT 3";
$result_approved_recent = mysqli_query($koneksi, $query_approved_recent);

// Query pengaju aktif (user dengan pengajuan terbanyak)
$query_active_users = "SELECT u.nama, u.prodi, COUNT(pe.id) as total_pengajuan
                       FROM users u
                       JOIN pengajuan_event pe ON u.id = pe.user_id
                       GROUP BY u.id
                       ORDER BY total_pengajuan DESC
                       LIMIT 4";
$result_active_users = mysqli_query($koneksi, $query_active_users);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - SIM-Event Kampus</title>
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
          <h1 class="text-xl font-bold text-dark">Dashboard Admin Pusat</h1>
        </div>
        
        <div class="flex items-center gap-4">
          <button class="relative text-gray-600 hover:text-primary">
            <i class="fas fa-bell text-xl"></i>
            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center"><?= $stats['pending'] ?></span>
          </button>
          
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold">
              <?= strtoupper(substr($_SESSION['admin_nama'], 0, 1)) ?>
            </div>
            <div class="hidden sm:block">
              <p class="font-semibold text-dark text-sm"><?= htmlspecialchars($_SESSION['admin_nama']) ?></p>
              <p class="text-gray-500 text-xs">Administrator</p>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Dashboard Content -->
    <div class="p-6">
      <!-- Stats Cards -->
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-amber-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 text-sm">Menunggu Persetujuan</p>
              <p class="text-3xl font-bold text-dark mt-1"><?= $stats['pending'] ?></p>
              <p class="text-amber-500 text-xs mt-1">Butuh review</p>
            </div>
            <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-clock text-amber-500 text-2xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-green-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 text-sm">Event Disetujui</p>
              <p class="text-3xl font-bold text-dark mt-1"><?= $stats['approved'] ?></p>
              <p class="text-green-500 text-xs mt-1">Total event</p>
            </div>
            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-check-circle text-green-500 text-2xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-red-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 text-sm">Event Ditolak</p>
              <p class="text-3xl font-bold text-dark mt-1"><?= $stats['rejected'] ?></p>
              <p class="text-gray-500 text-xs mt-1">Bulan ini</p>
            </div>
            <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-times-circle text-red-500 text-2xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-primary">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 text-sm">Event Berlangsung</p>
              <p class="text-3xl font-bold text-dark mt-1"><?= $stats['ongoing'] ?></p>
              <p class="text-primary text-xs mt-1">Sedang aktif</p>
            </div>
            <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-play-circle text-primary text-2xl"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="grid lg:grid-cols-3 gap-8">
        <!-- Pending Events Table -->
        <div class="lg:col-span-2">
          <div class="bg-white rounded-2xl shadow-sm">
            <div class="p-6 border-b flex items-center justify-between">
              <h3 class="text-lg font-bold text-dark">Pengajuan Event Terbaru</h3>
              <span class="px-3 py-1 bg-amber-100 text-amber-700 text-sm font-medium rounded-full"><?= $stats['pending'] ?> Menunggu</span>
            </div>
            
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Event</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Pengaju</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Tanggal Event</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                  </tr>
                </thead>
                <tbody class="divide-y">
                  <?php if (mysqli_num_rows($result_recent) > 0): ?>
                  <?php while ($row = mysqli_fetch_assoc($result_recent)): ?>
                  <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                          <i class="<?= $row['icon'] ?: 'fas fa-calendar' ?> text-primary"></i>
                        </div>
                        <div>
                          <p class="font-medium text-dark"><?= htmlspecialchars($row['judul']) ?></p>
                          <p class="text-xs text-gray-500"><?= htmlspecialchars($row['nama_kategori']) ?></p>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div>
                        <p class="text-sm font-medium text-dark"><?= htmlspecialchars($row['organisasi']) ?></p>
                        <p class="text-xs text-gray-500">Diajukan <?= date('d M Y', strtotime($row['created_at'])) ?></p>
                      </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600"><?= date('d M Y', strtotime($row['tanggal_mulai'])) ?></td>
                    <td class="px-6 py-4">
                      <div class="flex items-center gap-2">
                        <a href="persetujuan-event.php?id=<?= $row['id'] ?>" class="p-2 text-gray-400 hover:text-primary transition" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                  <?php else: ?>
                  <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                      <i class="fas fa-inbox text-4xl mb-3 text-gray-300"></i>
                      <p>Tidak ada pengajuan yang menunggu</p>
                    </td>
                  </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            
            <div class="p-4 border-t text-center">
              <a href="pengajuan.php" class="text-primary font-medium hover:underline">Lihat Semua Pengajuan</a>
            </div>
          </div>
        </div>

        <!-- Sidebar Stats -->
        <div class="space-y-6">
          <!-- Quick Stats -->
          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Ringkasan</h3>
            <div class="space-y-4">
              <?php
              $total_pengajuan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pengajuan_event"))['total'];
              $total_disetujui = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pengajuan_event WHERE status = 'disetujui'"))['total'];
              $total_ditolak = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pengajuan_event WHERE status = 'ditolak'"))['total'];
              $approval_rate = $total_pengajuan > 0 ? round(($total_disetujui / $total_pengajuan) * 100) : 0;
              ?>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Total Pengajuan</span>
                <span class="font-bold text-dark"><?= $total_pengajuan ?></span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Disetujui</span>
                <span class="font-bold text-green-500"><?= $total_disetujui ?></span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Ditolak</span>
                <span class="font-bold text-red-500"><?= $total_ditolak ?></span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Menunggu</span>
                <span class="font-bold text-amber-500"><?= $stats['pending'] ?></span>
              </div>
              <div class="h-2 bg-gray-200 rounded-full mt-2 overflow-hidden flex">
                <div class="h-full bg-green-500" style="width: <?= $approval_rate ?>%"></div>
                <div class="h-full bg-red-500" style="width: <?= $total_pengajuan > 0 ? round(($total_ditolak / $total_pengajuan) * 100) : 0 ?>%"></div>
              </div>
              <p class="text-xs text-gray-500 text-center"><?= $approval_rate ?>% tingkat persetujuan</p>
            </div>
          </div>

          <!-- Active Users -->
          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Pengaju Aktif</h3>
            <div class="space-y-4">
              <?php 
              $colors = ['blue', 'green', 'purple', 'amber'];
              $i = 0;
              while ($user = mysqli_fetch_assoc($result_active_users)): 
              $color = $colors[$i % count($colors)];
              ?>
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-<?= $color ?>-100 rounded-full flex items-center justify-center">
                  <span class="font-bold text-<?= $color ?>-500 text-sm"><?= strtoupper(substr($user['nama'], 0, 2)) ?></span>
                </div>
                <div class="flex-1">
                  <p class="font-medium text-dark text-sm"><?= htmlspecialchars($user['nama']) ?></p>
                  <p class="text-xs text-gray-500"><?= $user['total_pengajuan'] ?> event diajukan</p>
                </div>
              </div>
              <?php $i++; endwhile; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
