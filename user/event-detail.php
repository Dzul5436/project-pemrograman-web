<?php
session_start();
require_once '../koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT e.*, k.nama_kategori, k.icon, k.warna, u.nama as nama_penyelenggara
          FROM events e
          LEFT JOIN kategori_event k ON e.kategori_id = k.id
          LEFT JOIN users u ON e.user_id = u.id
          WHERE e.id = $id";
$result = mysqli_query($koneksi, $query);
$event = mysqli_fetch_assoc($result);

if (!$event) {
    header('Location: events.php');
    exit();
}

// Query untuk mendapatkan pembicara
$query_pembicara = "SELECT * FROM pembicara WHERE event_id = $id ORDER BY urutan";
$result_pembicara = mysqli_query($koneksi, $query_pembicara);

// Query untuk mendapatkan rundown
$query_rundown = "SELECT * FROM rundown_event WHERE event_id = $id ORDER BY urutan";
$result_rundown = mysqli_query($koneksi, $query_rundown);

// Query untuk event serupa
$query_related = "SELECT e.*, k.nama_kategori 
                  FROM events e 
                  LEFT JOIN kategori_event k ON e.kategori_id = k.id
                  WHERE e.kategori_id = {$event['kategori_id']} AND e.id != $id 
                  ORDER BY e.tanggal_mulai ASC 
                  LIMIT 3";
$result_related = mysqli_query($koneksi, $query_related);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($event['judul']) ?> - SIM-Event Kampus</title>
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
  <!-- Navbar -->
  <nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <a href="../index.php" class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
            <i class="fas fa-calendar-alt text-white text-xl"></i>
          </div>
          <span class="font-bold text-xl text-dark">SIM-Event</span>
        </a>
        
        <div class="flex items-center gap-4">
          <?php if (isset($_SESSION['user_id'])): ?>
          <a href="dashboard.php" class="text-gray-600 hover:text-primary">Dashboard</a>
          <?php else: ?>
          <a href="login.php" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <!-- Breadcrumb -->
  <div class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 py-3">
      <nav class="flex items-center gap-2 text-sm">
        <a href="../index.php" class="text-gray-500 hover:text-primary">Beranda</a>
        <i class="fas fa-chevron-right text-gray-300 text-xs"></i>
        <a href="events.php" class="text-gray-500 hover:text-primary">Daftar Event</a>
        <i class="fas fa-chevron-right text-gray-300 text-xs"></i>
        <span class="text-dark font-medium"><?= htmlspecialchars($event['judul']) ?></span>
      </nav>
    </div>
  </div>

  <!-- Event Detail -->
  <section class="py-8">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
          <!-- Event Image -->
          <div class="relative rounded-2xl overflow-hidden">
            <?php if ($event['poster']): ?>
            <img src="../uploads/posters/<?= $event['poster'] ?>" alt="<?= htmlspecialchars($event['judul']) ?>" class="w-full h-64 md:h-96 object-cover">
            <?php else: ?>
            <div class="w-full h-64 md:h-96 bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
              <i class="fas fa-calendar-alt text-white text-6xl"></i>
            </div>
            <?php endif; ?>
            <span class="absolute top-4 left-4 bg-primary text-white px-4 py-2 rounded-full font-medium">
              <i class="<?= $event['icon'] ?: 'fas fa-calendar' ?> mr-2"></i><?= htmlspecialchars($event['nama_kategori']) ?>
            </span>
          </div>
          
          <!-- Event Info -->
          <div class="bg-white rounded-2xl p-6 md:p-8 mt-6 shadow-lg">
            <div class="flex flex-wrap gap-3 mb-4">
              <span class="<?= $event['biaya'] > 0 ? 'bg-amber-100 text-amber-700' : 'bg-green-100 text-green-700' ?> px-3 py-1 rounded-full text-sm font-medium">
                <?= $event['biaya'] > 0 ? 'Rp ' . number_format($event['biaya'], 0, ',', '.') : 'Gratis' ?>
              </span>
              <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium"><?= ucfirst($event['tipe_event']) ?></span>
              <?php if ($event['benefit']): ?>
              <?php foreach (explode(',', $event['benefit']) as $benefit): ?>
              <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium"><?= htmlspecialchars($benefit) ?></span>
              <?php endforeach; ?>
              <?php endif; ?>
            </div>
            
            <h1 class="text-2xl md:text-3xl font-bold text-dark"><?= htmlspecialchars($event['judul']) ?></h1>
            
            <div class="flex items-center gap-4 mt-4">
              <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold">
                <?= strtoupper(substr($event['nama_penyelenggara'] ?? 'U', 0, 1)) ?>
              </div>
              <div>
                <p class="font-semibold text-dark"><?= htmlspecialchars($event['nama_penyelenggara'] ?? 'Unknown') ?></p>
                <p class="text-gray-500 text-sm">Penyelenggara</p>
              </div>
            </div>
            
            <hr class="my-6">
            
            <!-- Event Details Grid -->
            <div class="grid md:grid-cols-2 gap-6">
              <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                  <i class="fas fa-calendar-alt text-primary text-xl"></i>
                </div>
                <div>
                  <p class="text-gray-500 text-sm">Tanggal</p>
                  <p class="font-semibold text-dark"><?= date('l, d F Y', strtotime($event['tanggal_mulai'])) ?></p>
                </div>
              </div>
              
              <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                  <i class="fas fa-clock text-green-600 text-xl"></i>
                </div>
                <div>
                  <p class="text-gray-500 text-sm">Waktu</p>
                  <p class="font-semibold text-dark"><?= date('H:i', strtotime($event['waktu_mulai'])) ?> - <?= date('H:i', strtotime($event['waktu_selesai'])) ?> WIB</p>
                </div>
              </div>
              
              <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                  <i class="fas fa-map-marker-alt text-red-600 text-xl"></i>
                </div>
                <div>
                  <p class="text-gray-500 text-sm">Lokasi</p>
                  <p class="font-semibold text-dark"><?= htmlspecialchars($event['lokasi']) ?></p>
                </div>
              </div>
              
              <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                  <i class="fas fa-users text-purple-600 text-xl"></i>
                </div>
                <div>
                  <p class="text-gray-500 text-sm">Kuota Peserta</p>
                  <p class="font-semibold text-dark"><?= $event['kuota'] ?> peserta</p>
                </div>
              </div>
            </div>
            
            <hr class="my-6">
            
            <!-- Description -->
            <div>
              <h2 class="text-xl font-bold text-dark mb-4">Deskripsi Event</h2>
              <div class="text-gray-600 space-y-4">
                <?= nl2br(htmlspecialchars($event['deskripsi'])) ?>
              </div>
            </div>
            
            <?php if (mysqli_num_rows($result_pembicara) > 0): ?>
            <hr class="my-6">
            
            <!-- Speakers -->
            <div>
              <h2 class="text-xl font-bold text-dark mb-4">Pembicara</h2>
              <div class="grid md:grid-cols-2 gap-4">
                <?php while ($pembicara = mysqli_fetch_assoc($result_pembicara)): ?>
                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                  <?php if ($pembicara['foto']): ?>
                  <img src="../uploads/pembicara/<?= $pembicara['foto'] ?>" alt="<?= htmlspecialchars($pembicara['nama']) ?>" class="w-16 h-16 rounded-full object-cover">
                  <?php else: ?>
                  <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl">
                    <?= strtoupper(substr($pembicara['nama'], 0, 1)) ?>
                  </div>
                  <?php endif; ?>
                  <div>
                    <p class="font-semibold text-dark"><?= htmlspecialchars($pembicara['nama']) ?></p>
                    <p class="text-gray-500 text-sm"><?= htmlspecialchars($pembicara['jabatan']) ?></p>
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
            </div>
            <?php endif; ?>
            
            <?php if (mysqli_num_rows($result_rundown) > 0): ?>
            <hr class="my-6">
            
            <!-- Timeline -->
            <div>
              <h2 class="text-xl font-bold text-dark mb-4">Rundown Acara</h2>
              <div class="space-y-4">
                <?php while ($rundown = mysqli_fetch_assoc($result_rundown)): ?>
                <div class="flex gap-4">
                  <div class="w-20 text-sm font-medium text-primary"><?= $rundown['waktu'] ?></div>
                  <div class="flex-1 pb-4 border-l-2 border-gray-200 pl-4">
                    <p class="font-medium text-dark"><?= htmlspecialchars($rundown['kegiatan']) ?></p>
                    <?php if ($rundown['deskripsi']): ?>
                    <p class="text-gray-500 text-sm"><?= htmlspecialchars($rundown['deskripsi']) ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
        
        <!-- Sidebar -->
        <div class="lg:col-span-1">
          <!-- Registration Card -->
          <div class="bg-white rounded-2xl p-6 shadow-lg sticky top-24">
            <div class="text-center mb-6">
              <p class="text-gray-500">Biaya Pendaftaran</p>
              <p class="text-4xl font-bold text-primary">
                <?= $event['biaya'] > 0 ? 'Rp ' . number_format($event['biaya'], 0, ',', '.') : 'GRATIS' ?>
              </p>
            </div>
            
            <?php if ($event['benefit']): ?>
            <div class="space-y-4 mb-6">
              <?php foreach (explode(',', $event['benefit']) as $benefit): ?>
              <div class="flex items-center gap-3 text-gray-600">
                <i class="fas fa-check-circle text-green-500"></i>
                <span><?= htmlspecialchars($benefit) ?></span>
              </div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
            
            <a href="<?= htmlspecialchars($event['link_pendaftaran']) ?>" target="_blank" class="block w-full py-4 bg-primary text-white rounded-xl font-bold text-center hover:bg-secondary transition text-lg">
              <i class="fab fa-google mr-2"></i>Daftar via Google Form
            </a>
            
            <div class="mt-4 p-3 bg-blue-50 rounded-lg">
              <p class="text-sm text-blue-700 flex items-start gap-2">
                <i class="fas fa-info-circle mt-0.5"></i>
                <span>Pendaftaran ditutup <?= date('d M Y', strtotime($event['batas_pendaftaran'])) ?></span>
              </p>
            </div>
            
            <!-- Share -->
            <div class="mt-6 pt-6 border-t">
              <p class="text-sm text-gray-500 mb-3">Bagikan Event:</p>
              <div class="flex gap-2">
                <button onclick="shareToWhatsApp()" class="flex-1 py-2 border border-gray-200 rounded-lg hover:bg-green-50 hover:border-green-200 transition">
                  <i class="fab fa-whatsapp text-green-600"></i>
                </button>
                <button onclick="shareToTwitter()" class="flex-1 py-2 border border-gray-200 rounded-lg hover:bg-sky-50 hover:border-sky-200 transition">
                  <i class="fab fa-twitter text-sky-500"></i>
                </button>
                <button onclick="copyLink()" class="flex-1 py-2 border border-gray-200 rounded-lg hover:bg-gray-100 transition">
                  <i class="fas fa-link text-gray-600"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if (mysqli_num_rows($result_related) > 0): ?>
  <!-- Related Events -->
  <section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-2xl font-bold text-dark mb-8">Event Serupa</h2>
      <div class="grid md:grid-cols-3 gap-6">
        <?php while ($related = mysqli_fetch_assoc($result_related)): ?>
        <a href="event-detail.php?id=<?= $related['id'] ?>" class="bg-gray-50 rounded-xl p-4 hover:shadow-lg transition">
          <?php if ($related['poster']): ?>
          <img src="../uploads/posters/<?= $related['poster'] ?>" alt="<?= htmlspecialchars($related['judul']) ?>" class="w-full h-32 object-cover rounded-lg">
          <?php else: ?>
          <div class="w-full h-32 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center">
            <i class="fas fa-calendar text-white text-2xl"></i>
          </div>
          <?php endif; ?>
          <h3 class="font-semibold text-dark mt-3"><?= htmlspecialchars($related['judul']) ?></h3>
          <p class="text-gray-500 text-sm mt-1"><i class="far fa-calendar mr-1"></i><?= date('d M Y', strtotime($related['tanggal_mulai'])) ?></p>
        </a>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- Footer -->
  <footer class="bg-dark text-white py-12">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p class="text-gray-400">&copy; 2025 SIM-Event Kampus. All rights reserved.</p>
    </div>
  </footer>

  <script>
    function shareToWhatsApp() {
      const url = encodeURIComponent(window.location.href);
      const text = encodeURIComponent('<?= htmlspecialchars($event['judul']) ?> - Yuk ikutan event ini!');
      window.open(`https://wa.me/?text=${text}%20${url}`, '_blank');
    }
    
    function shareToTwitter() {
      const url = encodeURIComponent(window.location.href);
      const text = encodeURIComponent('<?= htmlspecialchars($event['judul']) ?>');
      window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`, '_blank');
    }
    
    function copyLink() {
      navigator.clipboard.writeText(window.location.href);
      alert('Link berhasil disalin!');
    }
  </script>
</body>
</html>
