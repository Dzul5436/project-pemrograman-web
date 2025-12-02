<!-- Sidebar Admin -->
<aside class="fixed left-0 top-0 h-full w-64 bg-slate-800 text-white z-40 hidden lg:block">
  <div class="p-6">
    <div class="flex items-center space-x-2">
      <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
        <i class="fas fa-shield-halved text-xl"></i>
      </div>
      <span class="font-bold text-lg">Admin Panel</span>
    </div>
  </div>
  
  <nav class="mt-6">
    <a href="dashboard.php" class="flex items-center gap-3 px-6 py-3 text-gray-300 hover:text-white hover:bg-white/5 transition <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'bg-primary/20 border-r-4 border-primary text-white' : '' ?>">
      <i class="fas fa-home w-5"></i> Dashboard
    </a>
    <a href="pengajuan.php" class="flex items-center gap-3 px-6 py-3 text-gray-300 hover:text-white hover:bg-white/5 transition <?= basename($_SERVER['PHP_SELF']) == 'pengajuan.php' ? 'bg-primary/20 border-r-4 border-primary text-white' : '' ?>">
      <i class="fas fa-clock w-5"></i> Pengajuan Event
      <?php
      $count_pending = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pengajuan_event WHERE status = 'menunggu'"));
      if ($count_pending['total'] > 0):
      ?>
      <span class="ml-auto bg-amber-500 text-white text-xs px-2 py-0.5 rounded-full"><?= $count_pending['total'] ?></span>
      <?php endif; ?>
    </a>
    <a href="events.php" class="flex items-center gap-3 px-6 py-3 text-gray-300 hover:text-white hover:bg-white/5 transition <?= basename($_SERVER['PHP_SELF']) == 'events.php' ? 'bg-primary/20 border-r-4 border-primary text-white' : '' ?>">
      <i class="fas fa-calendar w-5"></i> Kelola Event
    </a>
    <a href="users.php" class="flex items-center gap-3 px-6 py-3 text-gray-300 hover:text-white hover:bg-white/5 transition <?= basename($_SERVER['PHP_SELF']) == 'users.php' ? 'bg-primary/20 border-r-4 border-primary text-white' : '' ?>">
      <i class="fas fa-users w-5"></i> Kelola Users
    </a>
    <a href="kategori.php" class="flex items-center gap-3 px-6 py-3 text-gray-300 hover:text-white hover:bg-white/5 transition <?= basename($_SERVER['PHP_SELF']) == 'kategori.php' ? 'bg-primary/20 border-r-4 border-primary text-white' : '' ?>">
      <i class="fas fa-tags w-5"></i> Kategori Event
    </a>
    <a href="laporan.php" class="flex items-center gap-3 px-6 py-3 text-gray-300 hover:text-white hover:bg-white/5 transition <?= basename($_SERVER['PHP_SELF']) == 'laporan.php' ? 'bg-primary/20 border-r-4 border-primary text-white' : '' ?>">
      <i class="fas fa-chart-bar w-5"></i> Laporan
    </a>
  </nav>
  
  <div class="absolute bottom-0 left-0 right-0 p-6">
    <div class="flex items-center gap-3 mb-4 pb-4 border-b border-slate-700">
      <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
        <span class="font-bold"><?= strtoupper(substr($_SESSION['admin_nama'] ?? 'A', 0, 1)) ?></span>
      </div>
      <div>
        <p class="font-medium text-sm"><?= htmlspecialchars($_SESSION['admin_nama'] ?? 'Admin') ?></p>
        <p class="text-xs text-gray-400">Administrator</p>
      </div>
    </div>
    <a href="logout.php" class="flex items-center gap-3 text-gray-400 hover:text-white transition">
      <i class="fas fa-sign-out-alt w-5"></i> Keluar
    </a>
  </div>
</aside>
