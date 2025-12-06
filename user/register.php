<?php
session_start();
require_once '../koneksi.php';

$error = '';
$success = '';

$query_prodi = "SELECT DISTINCT prodi FROM mahasiswa WHERE prodi IS NOT NULL AND prodi != '' ORDER BY prodi";
$result_prodi = mysqli_query($koneksi, $query_prodi);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_depan'] . ' ' . $_POST['nama_belakang']);
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validasi
    if ($password !== $confirm_password) {
        $error = 'Password dan konfirmasi password tidak cocok!';
    } elseif (strlen($password) < 8) {
        $error = 'Password minimal 8 karakter!';
    } else {
        $check_email = "SELECT id FROM mahasiswa WHERE email = '$email'";
        $result_email = mysqli_query($koneksi, $check_email);
        
        if (mysqli_num_rows($result_email) > 0) {
            $error = 'Email sudah terdaftar! Gunakan email lain.';
        } else {
            $check_nim = "SELECT id FROM mahasiswa WHERE nim = '$nim'";
            $result_nim = mysqli_query($koneksi, $check_nim);
            
            if (mysqli_num_rows($result_nim) > 0) {
                $error = 'NIM sudah terdaftar! Gunakan NIM lain.';
            } else {
                // Hash password dengan MD5
                $hashed_password = md5($password);
                
                $query_insert = "INSERT INTO mahasiswa (nama, nim, email, password, prodi, no_hp, created_at) 
                                 VALUES ('$nama', '$nim', '$email', '$hashed_password', '$prodi', '$no_hp', NOW())";
                
                if (mysqli_query($koneksi, $query_insert)) {
                    $success = 'Registrasi berhasil! Silakan login.';
                    
                    $mahasiswa_id = mysqli_insert_id($koneksi);
                    $notif_query = "INSERT INTO notifikasi (mahasiswa_id, judul, pesan, tipe, created_at) 
                                    VALUES ($mahasiswa_id, 'Selamat Datang!', 'Akun Anda berhasil dibuat. Jelajahi event-event menarik di kampus!', 'info', NOW())";
                    mysqli_query($koneksi, $notif_query);
                } else {
                    $error = 'Terjadi kesalahan saat registrasi. Silakan coba lagi.';
                }
            }
        }
    }
}
?>
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
      
      <?php if ($error): ?>
      <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3">
        <i class="fas fa-exclamation-circle text-red-500"></i>
        <span class="text-red-700 text-sm"><?= $error ?></span>
      </div>
      <?php endif; ?>
      
      <?php if ($success): ?>
      <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
        <i class="fas fa-check-circle text-green-500"></i>
        <span class="text-green-700 text-sm"><?= $success ?> <a href="login.php" class="underline font-semibold">Login sekarang</a></span>
      </div>
      <?php endif; ?>
      
      <!-- Register Form -->
      <form method="POST" action="" class="mt-8 space-y-5">
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Depan</label>
            <input type="text" name="nama_depan" required placeholder="John" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" value="<?= isset($_POST['nama_depan']) ? htmlspecialchars($_POST['nama_depan']) : '' ?>">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Belakang</label>
            <input type="text" name="nama_belakang" required placeholder="Doe" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" value="<?= isset($_POST['nama_belakang']) ? htmlspecialchars($_POST['nama_belakang']) : '' ?>">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-id-card"></i>
            </span>
            <input type="text" name="nim" required placeholder="21501234567" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" value="<?= isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : '' ?>">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Email Kampus</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-envelope"></i>
            </span>
            <input type="email" name="email" required placeholder="nama@student.kampus.ac.id" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">No. HP / WhatsApp</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-phone"></i>
            </span>
            <input type="tel" name="no_hp" required placeholder="08xxxxxxxxxx" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" value="<?= isset($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : '' ?>">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Program Studi</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-graduation-cap"></i>
            </span>
            <select name="prodi" required class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition appearance-none bg-white">
              <option value="">Pilih Program Studi</option>
              <?php while ($row_prodi = mysqli_fetch_assoc($result_prodi)): ?>
              <option value="<?= $row_prodi['prodi'] ?>"><?= $row_prodi['prodi'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" name="password" required placeholder="Min. 8 karakter" class="w-full pl-12 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" id="password">
            <button type="button" onclick="togglePassword('password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
              <i class="fas fa-eye" id="password-icon"></i>
            </button>
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" name="confirm_password" required placeholder="Ulangi password" class="w-full pl-12 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition" id="confirm_password">
            <button type="button" onclick="togglePassword('confirm_password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
              <i class="fas fa-eye" id="confirm_password-icon"></i>
            </button>
          </div>
        </div>
        
        <div class="flex items-start gap-2">
          <input type="checkbox" name="agree" required class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary mt-1">
          <span class="text-sm text-gray-600">Saya menyetujui <a href="#" class="text-primary hover:underline">Syarat & Ketentuan</a> dan <a href="#" class="text-primary hover:underline">Kebijakan Privasi</a></span>
        </div>
        
        <button type="submit" class="w-full py-3 bg-primary text-white rounded-xl font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
          <i class="fas fa-user-plus"></i> Daftar Sekarang
        </button>
      </form>
      
      <p class="text-center text-gray-500 mt-8">
        Sudah punya akun? <a href="login.php" class="text-primary font-semibold hover:text-secondary">Masuk di sini</a>
      </p>
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
