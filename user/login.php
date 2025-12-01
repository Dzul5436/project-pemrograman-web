<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk - SIM-Event Kampus</title>
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
    <div class="bg-gradient-to-br from-primary via-secondary to-blue-900 p-12 hidden md:flex flex-col justify-between">
      <div>
        <div class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
            <i class="fas fa-calendar-check text-white text-xl"></i>
          </div>
          <span class="font-bold text-xl text-white">SIM-Event Kampus</span>
        </div>
      </div>
      
      <div>
        <img src="/placeholder.svg?height=300&width=350" alt="Event Illustration" class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold text-white mt-8">Selamat Datang Kembali!</h2>
        <p class="text-blue-200 mt-2">Masuk untuk mengakses event-event menarik di kampusmu.</p>
      </div>
      
      <div class="flex gap-2">
        <div class="w-12 h-2 bg-accent rounded-full"></div>
        <div class="w-2 h-2 bg-white/30 rounded-full"></div>
        <div class="w-2 h-2 bg-white/30 rounded-full"></div>
      </div>
    </div>
    
    <!-- Right Side - Login Form -->
    <div class="p-8 md:p-12">
      <div class="md:hidden flex items-center space-x-2 mb-8">
        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
          <i class="fas fa-calendar-check text-white text-xl"></i>
        </div>
        <span class="font-bold text-xl text-dark">SIM-Event Kampus</span>
      </div>
      
      <h1 class="text-2xl md:text-3xl font-bold text-dark">Masuk ke Akun</h1>
      <p class="text-gray-500 mt-2">Silakan masuk untuk melanjutkan</p>
      
      <!-- Login Form -->
      <form class="mt-8 space-y-6">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-envelope"></i>
            </span>
            <input type="email" placeholder="nama@student.kampus.ac.id" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" placeholder="********" class="w-full pl-12 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
            <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </div>
        
        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
            <span class="text-sm text-gray-600">Ingat saya</span>
          </label>
          <a href="#" class="text-sm text-primary hover:text-secondary font-medium">Lupa password?</a>
        </div>
        
        <a href="dashboard-mahasiswa.html" class="w-full py-3 bg-primary text-white rounded-xl font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
          <i class="fas fa-sign-in-alt"></i> Masuk
        </a>
        
        <div class="relative">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-200"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-4 bg-white text-gray-500">atau masuk dengan</span>
          </div>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
          <button type="button" class="py-3 border border-gray-300 rounded-xl font-medium hover:bg-gray-50 transition flex items-center justify-center gap-2">
            <i class="fab fa-google text-red-500"></i> Google
          </button>
          <button type="button" class="py-3 border border-gray-300 rounded-xl font-medium hover:bg-gray-50 transition flex items-center justify-center gap-2">
            <i class="fas fa-university text-primary"></i> SSO Kampus
          </button>
        </div>
      </form>
      
      <p class="text-center text-gray-500 mt-8">
        Belum punya akun? <a href="register.html" class="text-primary font-semibold hover:text-secondary">Daftar sekarang</a>
      </p>
      
      <!-- Updated quick access - removed panitia, only mahasiswa now -->
      <div class="mt-8 p-4 bg-blue-50 rounded-xl">
        <p class="text-sm text-blue-800 font-medium mb-3"><i class="fas fa-info-circle mr-2"></i>Demo Quick Access:</p>
        <div class="flex flex-wrap gap-2">
          <a href="dashboard-mahasiswa.html" class="px-4 py-2 bg-primary text-white text-sm rounded-lg hover:bg-secondary transition flex items-center gap-2">
            <i class="fas fa-user-graduate"></i> Masuk sebagai Mahasiswa
          </a>
        </div>
      </div>

      <!-- Admin login link -->
      <div class="mt-4 text-center">
        <a href="../admin/login.html" class="text-slate-500 hover:text-slate-700 text-sm flex items-center justify-center gap-2">
          <i class="fas fa-shield-halved"></i> Masuk sebagai Admin
        </a>
      </div>
    </div>
  </div>
</body>
</html>
