<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIM-Event Kampus</title>
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
<body class="bg-gray-50 min-h-screen">
  <!-- Navbar -->
  <nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center h-16">
        <div class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
            <i class="fas fa-calendar-check text-white text-xl"></i>
          </div>
          <span class="font-bold text-xl text-dark">SIM-Event Kampus</span>
        </div>
        
        <div class="hidden md:flex items-center space-x-8">
          <a href="./?p=blk" class="text-primary font-semibold">Beranda</a>
          <a href="./?p=ev" class="text-gray-600 hover:text-primary transition">Daftar Event</a>
          <a href="user/calendar.html" class="text-gray-600 hover:text-primary transition">Kalender</a>
          <a href="user/about.html" class="text-gray-600 hover:text-primary transition">Tentang</a>
        </div>
        
        <div class="flex items-center space-x-3">
          <a href="login.html" class="px-4 py-2 text-primary border-2 border-primary rounded-lg hover:bg-primary hover:text-white transition font-medium">Masuk</a>
          <a href="register.html" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition font-medium hidden sm:block">Daftar</a>
        </div>
      </div>
    </div>
  </nav>

  <?php require "route-all.php"; ?>

  <!-- Footer -->
  <footer class="bg-dark text-white py-16">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-8">
        <div>
          <div class="flex items-center space-x-2 mb-4">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
              <i class="fas fa-calendar-check text-xl"></i>
            </div>
            <span class="font-bold text-xl">SIM-Event Kampus</span>
          </div>
          <p class="text-gray-400 text-sm">Platform manajemen event kampus terlengkap untuk mahasiswa dan panitia.</p>
          <div class="flex gap-4 mt-4">
            <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
        </div>
        
        <div>
          <h4 class="font-bold text-lg mb-4">Menu</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="index.html" class="hover:text-white transition">Beranda</a></li>
            <li><a href="events.html" class="hover:text-white transition">Daftar Event</a></li>
            <li><a href="calendar.html" class="hover:text-white transition">Kalender</a></li>
            <li><a href="about.html" class="hover:text-white transition">Tentang Kami</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="font-bold text-lg mb-4">Kategori Event</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white transition">Seminar</a></li>
            <li><a href="#" class="hover:text-white transition">Workshop</a></li>
            <li><a href="#" class="hover:text-white transition">Lomba</a></li>
            <li><a href="#" class="hover:text-white transition">Talkshow</a></li>
          </ul>
        </div>
        
        <div>
          <h4 class="font-bold text-lg mb-4">Kontak</h4>
          <ul class="space-y-2 text-gray-400">
            <li class="flex items-center gap-2"><i class="fas fa-envelope"></i> info@simevent.ac.id</li>
            <li class="flex items-center gap-2"><i class="fas fa-phone"></i> (021) 123-4567</li>
            <li class="flex items-center gap-2"><i class="fas fa-map-marker-alt"></i> Kampus Utama, Gedung A</li>
          </ul>
        </div>
      </div>
      
      <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400 text-sm">
        <p>&copy; 2025 SIM-Event Kampus. All rights reserved.</p>
      </div>
    </div>
  </footer>
</body>
</html>
