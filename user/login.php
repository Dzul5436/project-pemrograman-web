<?php
session_start();
require_once '../koneksi.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];
    
    // Change: Query ke tabel mahasiswa (bukan users)
    $query = "SELECT * FROM mahasiswa WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password dengan MD5
        if (md5($password) === $user['password']) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nim'] = $user['nim'];
            $_SESSION['fakultas'] = $user['fakultas'];
            $_SESSION['prodi'] = $user['prodi'];
            $_SESSION['no_hp'] = $user['no_hp'];
            
            // Redirect ke dashboard
            header('Location: dashboard.php');
            exit();
        } else {
            $error = 'Password yang Anda masukkan salah!';
        }
    } else {
        $error = 'Email tidak ditemukan!';
    }
}
?>
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
      
      <?php if ($error): ?>
      <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3">
        <i class="fas fa-exclamation-circle text-red-500"></i>
        <span class="text-red-700 text-sm"><?= $error ?></span>
      </div>
      <?php endif; ?>
      
      <?php if ($success): ?>
      <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
        <i class="fas fa-check-circle text-green-500"></i>
        <span class="text-green-700 text-sm"><?= $success ?></span>
      </div>
      <?php endif; ?>
      
      <form method="POST" action="" class="mt-8 space-y-6">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-envelope"></i>
            </span>
            <input type="email" name="email" required placeholder="nama@student.kampus.ac.id" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" name="password" required placeholder="********" class="w-full pl-12 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" id="password">
            <button type="button" onclick="togglePassword('password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
              <i class="fas fa-eye" id="password-icon"></i>
            </button>
          </div>
        </div>
        
        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
            <span class="text-sm text-gray-600">Ingat saya</span>
          </label>
          <a href="#" class="text-sm text-primary hover:text-secondary font-medium">Lupa password?</a>
        </div>
        
        <button type="submit" class="w-full py-3 bg-primary text-white rounded-xl font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
          <i class="fas fa-sign-in-alt"></i> Masuk
        </button>
      </form>
      
      <p class="text-center text-gray-500 mt-8">
        Belum punya akun? <a href="register.php" class="text-primary font-semibold hover:text-secondary">Daftar sekarang</a>
      </p>
      
      <div class="mt-4 text-center">
        <a href="../admin/login.php" class="text-slate-500 hover:text-slate-700 text-sm flex items-center justify-center gap-2">
          <i class="fas fa-shield-halved"></i> Masuk sebagai Admin
        </a>
      </div>
    </div>
  </div>
  
  <script>
    function togglePassword(inputId) {
      const input = document.getElementById(inputId);
      const icon = document.getElementById(inputId + '-icon');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>
