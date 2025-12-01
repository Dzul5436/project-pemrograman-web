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
  <!-- Sidebar -->
  <aside class="fixed left-0 top-0 h-full w-64 bg-dark text-white z-40 hidden lg:block">
    <div class="p-6">
      <div class="flex items-center space-x-2">
        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
          <i class="fas fa-user-shield text-xl"></i>
        </div>
        <div>
          <span class="font-bold text-lg">SIM-Event</span>
          <p class="text-xs text-gray-400">Admin Pusat</p>
        </div>
      </div>
    </div>
    
    <nav class="mt-6">
      <a href="./?p=dasboard" class="flex items-center gap-3 px-6 py-3 bg-primary/20 border-r-4 border-primary text-white">
        <i class="fas fa-tachometer-alt w-5"></i> Dashboard
      </a>
      <!-- Changed menu to focus on event approval requests -->
      <a href="./?p=buat-event" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-inbox w-5"></i> Pengajuan Event
        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">5</span>
      </a>
      <a href="#" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-calendar-check w-5"></i> Event Disetujui
      </a>
      <a href="#" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-calendar-times w-5"></i> Event Ditolak
      </a>
      <a href="#" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-chart-pie w-5"></i> Laporan
      </a>
      <a href="#" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-cog w-5"></i> Pengaturan
      </a>
    </nav>
    
    <div class="absolute bottom-0 left-0 right-0 p-6">
      <a href="index.html" class="flex items-center gap-3 text-gray-400 hover:text-white transition">
        <i class="fas fa-sign-out-alt w-5"></i> Keluar
      </a>
    </div>
  </aside>

  <?php
  require 'route-admin.php';
  ?>

</body>
</html>
