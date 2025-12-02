<?php
session_start();
require_once './koneksi.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
$kategori_filter = isset($_GET['kategori']) ? (int)$_GET['kategori'] : 0;
$status_filter = isset($_GET['status']) ? mysqli_real_escape_string($koneksi, $_GET['status']) : '';

// Query dasar untuk mendapatkan events
$query = "SELECT e.*, k.nama_kategori, u.nama as nama_penyelenggara
          FROM events e
          LEFT JOIN kategori_event k ON e.kategori_id = k.id
          LEFT JOIN users u ON e.user_id = u.id
          WHERE 1=1";

// Tambah filter pencarian
if ($search) {
    $query .= " AND (e.judul LIKE '%$search%' OR e.deskripsi LIKE '%$search%')";
}

// Tambah filter kategori
if ($kategori_filter > 0) {
    $query .= " AND e.kategori_id = $kategori_filter";
}

// Tambah filter status
if ($status_filter === 'upcoming') {
    $query .= " AND e.tanggal_mulai > CURDATE()";
} elseif ($status_filter === 'ongoing') {
    $query .= " AND e.tanggal_mulai <= CURDATE() AND e.tanggal_selesai >= CURDATE()";
} elseif ($status_filter === 'past') {
    $query .= " AND e.tanggal_selesai < CURDATE()";
}

$query .= " ORDER BY e.tanggal_mulai ASC";

$result_events = mysqli_query($koneksi, $query);
$total_events = mysqli_num_rows($result_events);

// Query untuk kategori
$query_kategori = "SELECT * FROM kategori_event ORDER BY nama_kategori";
$result_kategori = mysqli_query($koneksi, $query_kategori);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Event - SIM-Event Kampus</title>
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
          <a href="logout.php" class="text-gray-600 hover:text-primary">Logout</a>
          <?php else: ?>
          <a href="login.php" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <section class="bg-gradient-to-r from-primary to-secondary py-12">
    <div class="max-w-7xl mx-auto px-4">
      <h1 class="text-3xl md:text-4xl font-bold text-white">Daftar Event</h1>
      <p class="text-blue-100 mt-2">Temukan dan ikuti event-event menarik di kampus</p>
      
      <!-- Search & Filter -->
      <form method="GET" action="" class="mt-8 bg-white rounded-2xl p-4 shadow-lg">
        <div class="grid md:grid-cols-4 gap-4">
          <div class="md:col-span-2 relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-search"></i>
            </span>
            <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Cari event..." class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
          </div>
          <div class="relative">
            <select name="kategori" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none appearance-none bg-white">
              <option value="">Semua Kategori</option>
              <?php 
              mysqli_data_seek($result_kategori, 0);
              while ($kat = mysqli_fetch_assoc($result_kategori)): 
              ?>
              <option value="<?= $kat['id'] ?>" <?= $kategori_filter == $kat['id'] ? 'selected' : '' ?>><?= htmlspecialchars($kat['nama_kategori']) ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="relative">
            <select name="status" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none appearance-none bg-white">
              <option value="">Semua Status</option>
              <option value="upcoming" <?= $status_filter === 'upcoming' ? 'selected' : '' ?>>Akan Datang</option>
              <option value="ongoing" <?= $status_filter === 'ongoing' ? 'selected' : '' ?>>Sedang Berlangsung</option>
              <option value="past" <?= $status_filter === 'past' ? 'selected' : '' ?>>Selesai</option>
            </select>
          </div>
        </div>
        <div class="mt-4 flex justify-end">
          <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition">
            <i class="fas fa-search mr-2"></i>Cari
          </button>
        </div>
      </form>
    </div>
  </section>

  <!-- Event Categories -->
  <section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex flex-wrap gap-3">
        <button class="px-5 py-2 bg-primary text-white rounded-full font-medium">Semua</button>
        <button class="px-5 py-2 bg-gray-100 text-gray-700 rounded-full font-medium hover:bg-blue-100 hover:text-primary transition flex items-center gap-2">
          <i class="fas fa-microphone"></i> Seminar
        </button>
        <button class="px-5 py-2 bg-gray-100 text-gray-700 rounded-full font-medium hover:bg-green-100 hover:text-green-600 transition flex items-center gap-2">
          <i class="fas fa-laptop-code"></i> Workshop
        </button>
        <button class="px-5 py-2 bg-gray-100 text-gray-700 rounded-full font-medium hover:bg-purple-100 hover:text-purple-600 transition flex items-center gap-2">
          <i class="fas fa-trophy"></i> Lomba
        </button>
        <button class="px-5 py-2 bg-gray-100 text-gray-700 rounded-full font-medium hover:bg-amber-100 hover:text-amber-600 transition flex items-center gap-2">
          <i class="fas fa-comments"></i> Talkshow
        </button>
      </div>
    </div>
  </section>

  <!-- Events Grid -->
  <section class="py-12">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex items-center justify-between mb-8">
        <p class="text-gray-600">Menampilkan <span class="font-semibold text-dark"><?= $total_events ?> event</span></p>
      </div>
      
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if (mysqli_num_rows($result_events) > 0): ?>
        <?php while ($event = mysqli_fetch_assoc($result_events)): ?>
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
          <div class="relative">
            <?php if ($event['poster']): ?>
            <img src="../uploads/posters/<?= $event['poster'] ?>" alt="<?= htmlspecialchars($event['judul']) ?>" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
            <?php else: ?>
            <div class="w-full h-48 bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
              <i class="fas fa-calendar-alt text-white text-4xl"></i>
            </div>
            <?php endif; ?>
            <span class="absolute top-4 left-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-medium"><?= htmlspecialchars($event['nama_kategori']) ?></span>
            <span class="absolute top-4 right-4 <?= $event['biaya'] > 0 ? 'bg-accent text-dark' : 'bg-green-500 text-white' ?> px-3 py-1 rounded-full text-sm font-medium">
              <?= $event['biaya'] > 0 ? 'Rp ' . number_format($event['biaya'], 0, ',', '.') : 'Gratis' ?>
            </span>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
              <span class="flex items-center gap-1"><i class="far fa-calendar"></i> <?= date('d M Y', strtotime($event['tanggal_mulai'])) ?></span>
              <span class="flex items-center gap-1"><i class="far fa-clock"></i> <?= date('H:i', strtotime($event['waktu_mulai'])) ?> WIB</span>
            </div>
            <h3 class="text-xl font-bold text-dark mb-2"><?= htmlspecialchars($event['judul']) ?></h3>
            <p class="text-gray-600 text-sm mb-4 line-clamp-2"><?= htmlspecialchars(substr($event['deskripsi'], 0, 100)) ?>...</p>
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-xs font-bold">
                  <?= strtoupper(substr($event['nama_penyelenggara'] ?? 'U', 0, 1)) ?>
                </div>
                <span class="text-sm text-gray-600"><?= htmlspecialchars($event['nama_penyelenggara'] ?? 'Unknown') ?></span>
              </div>
            </div>
            <div class="flex gap-2">
              <a href="event-detail.php?id=<?= $event['id'] ?>" class="flex-1 text-center py-3 border-2 border-primary text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition">Detail</a>
              <a href="<?= htmlspecialchars($event['link_pendaftaran']) ?>" target="_blank" class="flex-1 text-center py-3 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
                <i class="fab fa-google text-sm"></i> Daftar
              </a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
        <div class="col-span-3 text-center py-12">
          <i class="fas fa-calendar-times text-6xl text-gray-300 mb-4"></i>
          <h3 class="text-xl font-semibold text-gray-600">Tidak ada event ditemukan</h3>
          <p class="text-gray-500 mt-2">Coba ubah filter pencarian Anda</p>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-12">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <div class="flex items-center justify-center space-x-2 mb-4">
        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
          <i class="fas fa-calendar-check text-xl"></i>
        </div>
        <span class="font-bold text-xl">SIM-Event Kampus</span>
      </div>
      <p class="text-gray-400">&copy; 2025 SIM-Event Kampus. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
