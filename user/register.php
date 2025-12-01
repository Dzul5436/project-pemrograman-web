<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar - SIM-Event Kampus</title>
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
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
  <div class="w-full max-w-5xl grid md:grid-cols-2 bg-white rounded-3xl shadow-2xl overflow-hidden">
    <!-- Left Side - Illustration -->
    <div class="bg-gradient-to-br from-green-500 via-emerald-600 to-teal-700 p-12 hidden md:flex flex-col justify-between">
      <div>
        <div class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
            <i class="fas fa-calendar-check text-white text-xl"></i>
          </div>
          <span class="font-bold text-xl text-white">SIM-Event Kampus</span>
        </div>
      </div>
      
      <div>
        <img src="/placeholder.svg?height=300&width=350" alt="Register Illustration" class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold text-white mt-8">Bergabung Sekarang!</h2>
        <p class="text-green-100 mt-2">Buat akun dan mulai ikuti event-event menarik di kampusmu.</p>
      </div>
      
      <div class="flex gap-2">
        <div class="w-2 h-2 bg-white/30 rounded-full"></div>
        <div class="w-12 h-2 bg-accent rounded-full"></div>
        <div class="w-2 h-2 bg-white/30 rounded-full"></div>
      </div>
    </div>
    
    <!-- Right Side - Register Form -->
    <div class="p-8 md:p-12">
      <div class="md:hidden flex items-center space-x-2 mb-8">
        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
          <i class="fas fa-calendar-check text-white text-xl"></i>
        </div>
        <span class="font-bold text-xl text-dark">SIM-Event Kampus</span>
      </div>
      
      <h1 class="text-2xl md:text-3xl font-bold text-dark">Buat Akun Baru</h1>
      <p class="text-gray-500 mt-2">Isi data diri untuk mendaftar</p>
      
      <!-- Register Form -->
      <form class="mt-8 space-y-5">
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Depan</label>
            <input type="text" placeholder="John" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Belakang</label>
            <input type="text" placeholder="Doe" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-id-card"></i>
            </span>
            <input type="text" placeholder="21501234567" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Email Kampus</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-envelope"></i>
            </span>
            <input type="email" placeholder="nama@student.kampus.ac.id" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Fakultas / Program Studi</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-graduation-cap"></i>
            </span>
            <select class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition appearance-none bg-white">
              <option value="">Pilih Fakultas / Prodi</option>
              <option value="ti">Teknik Informatika</option>
              <option value="si">Sistem Informasi</option>
              <option value="mi">Manajemen Informatika</option>
              <option value="ak">Akuntansi</option>
              <option value="mn">Manajemen</option>
            </select>
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" placeholder="Min. 8 karakter" class="w-full pl-12 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
            <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </div>
        
        <div class="flex items-start gap-2">
          <input type="checkbox" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary mt-1">
          <span class="text-sm text-gray-600">Saya menyetujui <a href="#" class="text-primary hover:underline">Syarat & Ketentuan</a> dan <a href="#" class="text-primary hover:underline">Kebijakan Privasi</a></span>
        </div>
        
        <button type="submit" class="w-full py-3 bg-primary text-white rounded-xl font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
          <i class="fas fa-user-plus"></i> Daftar Sekarang
        </button>
      </form>
      
      <p class="text-center text-gray-500 mt-8">
        Sudah punya akun? <a href="login.html" class="text-primary font-semibold hover:text-secondary">Masuk di sini</a>
      </p>
    </div>
  </div>
</body>
</html>
