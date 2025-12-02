<?php
session_start();
require_once '../koneksi.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];
    
    // Query untuk mencari user berdasarkan email dan role = 'admin'
    $query = "SELECT * FROM users WHERE email = '$email' AND role = 'admin'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);
        
        if (md5($password) === $admin['password']) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_nama'] = $admin['nama'];
            $_SESSION['admin_email'] = $admin['email'];
            $_SESSION['admin_role'] = $admin['role'];
            
            // Redirect ke dashboard admin
            header('Location: dashboard.php');
            exit();
        } else {
            $error = 'Password yang Anda masukkan salah!';
        }
    } else {
        $error = 'Email tidak ditemukan atau bukan akun admin!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - SIM-Event Kampus</title>
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
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">
  <div class="w-full max-w-md">
    <!-- Logo -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-16 h-16 bg-primary rounded-2xl mb-4">
        <i class="fas fa-shield-halved text-white text-2xl"></i>
      </div>
      <h1 class="text-2xl font-bold text-white">Admin Panel</h1>
      <p class="text-slate-400 mt-1">SIM-Event Kampus</p>
    </div>

    <!-- Login Card -->
    <div class="bg-slate-800 rounded-2xl shadow-xl p-8 border border-slate-700">
      <div class="mb-6">
        <h2 class="text-xl font-semibold text-white">Masuk sebagai Admin</h2>
        <p class="text-slate-400 text-sm mt-1">Masukkan kredensial admin untuk melanjutkan</p>
      </div>

      <!-- Alert untuk error message -->
      <?php if ($error): ?>
      <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 mb-6">
        <div class="flex items-start gap-3">
          <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
          <div>
            <p class="text-red-500 text-sm font-medium">Login Gagal</p>
            <p class="text-red-500/70 text-xs mt-1"><?= $error ?></p>
          </div>
        </div>
      </div>
      <?php else: ?>
      <!-- Alert Box -->
      <div class="bg-amber-500/10 border border-amber-500/30 rounded-xl p-4 mb-6">
        <div class="flex items-start gap-3">
          <i class="fas fa-exclamation-triangle text-amber-500 mt-0.5"></i>
          <div>
            <p class="text-amber-500 text-sm font-medium">Area Terbatas</p>
            <p class="text-amber-500/70 text-xs mt-1">Halaman ini hanya untuk administrator sistem.</p>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- Login Form dengan method POST -->
      <form method="POST" action="" class="space-y-5">
        <div>
          <label class="block text-sm font-medium text-slate-300 mb-2">Email Admin</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
              <i class="fas fa-user-shield"></i>
            </span>
            <input type="email" name="email" required placeholder="admin@kampus.ac.id" class="w-full pl-12 pr-4 py-3 bg-slate-700 border border-slate-600 text-white rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition placeholder-slate-500" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-slate-300 mb-2">Password</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" name="password" required placeholder="••••••••" class="w-full pl-12 pr-12 py-3 bg-slate-700 border border-slate-600 text-white rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition placeholder-slate-500" id="admin-password">
            <button type="button" onclick="togglePassword('admin-password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300">
              <i class="fas fa-eye" id="admin-password-icon"></i>
            </button>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="w-4 h-4 text-primary bg-slate-700 border-slate-600 rounded focus:ring-primary focus:ring-offset-slate-800">
            <span class="text-sm text-slate-400">Ingat saya</span>
          </label>
        </div>
        
        <!-- Ubah dari link ke button submit -->
        <button type="submit" class="w-full py-3 bg-primary text-white rounded-xl font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
          <i class="fas fa-right-to-bracket"></i> Masuk ke Dashboard
        </button>
      </form>

      <!-- Divider -->
      <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-slate-700"></div>
        </div>
      </div>
    </div>

    <!-- Footer Links -->
    <div class="mt-6 text-center">
      <a href="../user/login.php" class="text-slate-400 hover:text-white text-sm flex items-center justify-center gap-2">
        <i class="fas fa-arrow-left"></i> Kembali ke Login Mahasiswa
      </a>
    </div>

    <!-- Security Info -->
    <div class="mt-8 flex items-center justify-center gap-4 text-slate-500 text-xs">
      <span class="flex items-center gap-1">
        <i class="fas fa-lock"></i> SSL Secured
      </span>
      <span class="flex items-center gap-1">
        <i class="fas fa-shield-check"></i> 2FA Enabled
      </span>
      <span class="flex items-center gap-1">
        <i class="fas fa-clock"></i> Session: 30 min
      </span>
    </div>
  </div>

  <!-- Script toggle password visibility -->
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
