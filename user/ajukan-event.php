<?php
session_start();
require_once '../koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$error = '';
$success = '';
$user_id = $_SESSION['user_id'];

$query_kategori = "SELECT * FROM kategori_event ORDER BY nama_kategori";
$result_kategori = mysqli_query($koneksi, $query_kategori);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $kategori_id = (int)$_POST['kategori_id'];
    $tanggal_mulai = mysqli_real_escape_string($koneksi, $_POST['tanggal_mulai']);
    $tanggal_selesai = mysqli_real_escape_string($koneksi, $_POST['tanggal_selesai'] ?: $_POST['tanggal_mulai']);
    $waktu_mulai = mysqli_real_escape_string($koneksi, $_POST['waktu_mulai']);
    $waktu_selesai = mysqli_real_escape_string($koneksi, $_POST['waktu_selesai']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $tipe_lokasi = mysqli_real_escape_string($koneksi, $_POST['tipe_event']);
    $link_online = mysqli_real_escape_string($koneksi, $_POST['link_meeting']);
    $kuota_peserta = (int)$_POST['kuota'];
    $biaya = (float)$_POST['biaya'];
    $link_google_form = mysqli_real_escape_string($koneksi, $_POST['link_pendaftaran']);
    $nama_organisasi = mysqli_real_escape_string($koneksi, $_POST['organisasi']);
    $kontak_pengaju = mysqli_real_escape_string($koneksi, $_POST['no_hp_pic']);
    
    // Upload poster jika ada
    $poster = '';
    if (isset($_FILES['poster']) && $_FILES['poster']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['poster']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $new_filename = 'poster_' . time() . '_' . uniqid() . '.' . $ext;
            $upload_path = '../uploads/posters/' . $new_filename;
            
            if (!is_dir('../uploads/posters/')) {
                mkdir('../uploads/posters/', 0777, true);
            }
            
            if (move_uploaded_file($_FILES['poster']['tmp_name'], $upload_path)) {
                $poster = $new_filename;
            }
        }
    }
    
    $query_insert = "INSERT INTO pengajuan_event (
        judul, deskripsi, kategori_id, tanggal_mulai, tanggal_selesai, 
        waktu_mulai, waktu_selesai, lokasi, tipe_lokasi, link_online,
        poster, kuota_peserta, link_google_form, biaya, nama_organisasi, 
        kontak_pengaju, pengaju_id, status, created_at
    ) VALUES (
        '$judul', '$deskripsi', $kategori_id, '$tanggal_mulai', '$tanggal_selesai',
        '$waktu_mulai', '$waktu_selesai', '$lokasi', '$tipe_lokasi', '$link_online',
        '$poster', $kuota_peserta, '$link_google_form', $biaya, '$nama_organisasi',
        '$kontak_pengaju', $user_id, 'menunggu', NOW()
    )";
    
    if (mysqli_query($koneksi, $query_insert)) {
        $success = 'Pengajuan event berhasil dikirim! Admin akan mereview dalam 1-3 hari kerja.';
        
        $notif_query = "INSERT INTO notifikasi (mahasiswa_id, judul, pesan, tipe, created_at) 
                        VALUES ($user_id, 'Pengajuan Event Terkirim', 'Pengajuan event \"$judul\" berhasil dikirim dan sedang menunggu review admin.', 'info', NOW())";
        mysqli_query($koneksi, $notif_query);
    } else {
        $error = 'Terjadi kesalahan saat mengajukan event. Silakan coba lagi.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajukan Event - SIM-Event Kampus</title>
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
        <a href="dashboard.php" class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
            <i class="fas fa-calendar-alt text-white text-xl"></i>
          </div>
          <span class="font-bold text-xl text-dark">SIM-Event</span>
        </a>
        
        <div class="flex items-center gap-4">
          <a href="dashboard.php" class="text-gray-600 hover:text-primary">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="max-w-4xl mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
      <h1 class="text-2xl font-bold text-dark">Ajukan Event Baru</h1>
      <p class="text-gray-600 mt-1">Isi formulir berikut untuk mengajukan event. Admin akan mereview pengajuan Anda.</p>
    </div>

    <?php if ($error): ?>
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 flex items-center gap-3">
      <i class="fas fa-exclamation-circle text-red-500"></i>
      <span class="text-red-700"><?= $error ?></span>
    </div>
    <?php endif; ?>
    
    <?php if ($success): ?>
    <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-6 flex items-center gap-3">
      <i class="fas fa-check-circle text-green-500"></i>
      <span class="text-green-700"><?= $success ?></span>
    </div>
    <?php endif; ?>

    <!-- Info Box -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6 flex items-start gap-3">
      <i class="fas fa-info-circle text-primary mt-0.5"></i>
      <div>
        <p class="text-sm text-dark font-medium">Proses Pengajuan Event</p>
        <p class="text-sm text-gray-600 mt-1">Setelah Anda mengajukan event, admin pusat akan mereview dalam 1-3 hari kerja. Anda akan mendapat notifikasi jika event disetujui atau ditolak.</p>
      </div>
    </div>

    <form method="POST" action="" enctype="multipart/form-data" class="space-y-6">
      <!-- Basic Info -->
      <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
          <i class="fas fa-info-circle text-primary"></i> Informasi Dasar
        </h2>
        
        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Event <span class="text-red-500">*</span></label>
            <input type="text" name="judul" required placeholder="Contoh: Seminar AI & Machine Learning" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
              <select name="kategori_id" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition appearance-none bg-white">
                <option value="">Pilih Kategori</option>
                <?php while ($kat = mysqli_fetch_assoc($result_kategori)): ?>
                <option value="<?= $kat['id'] ?>"><?= htmlspecialchars($kat['nama_kategori']) ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Event <span class="text-red-500">*</span></label>
              <select name="tipe_event" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition appearance-none bg-white">
                <option value="">Pilih Tipe</option>
                <option value="offline">Offline</option>
                <option value="online">Online</option>
                <option value="hybrid">Hybrid (Online & Offline)</option>
              </select>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Organisasi/Penyelenggara <span class="text-red-500">*</span></label>
            <input type="text" name="organisasi" required placeholder="Contoh: Himpunan Mahasiswa Teknik Informatika" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Event <span class="text-red-500">*</span></label>
            <textarea name="deskripsi" required rows="5" placeholder="Jelaskan tentang event ini secara detail..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition resize-none"></textarea>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Poster/Banner Event</label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-primary transition cursor-pointer" onclick="document.getElementById('poster').click()">
              <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
              <p class="text-gray-600">Drag & drop gambar atau <span class="text-primary font-medium">klik untuk upload</span></p>
              <p class="text-gray-400 text-sm mt-1">PNG, JPG hingga 5MB (Rekomendasi: 1200x630px)</p>
              <input type="file" name="poster" id="poster" accept="image/*" class="hidden">
            </div>
          </div>
        </div>
      </div>

      <!-- Google Form Link -->
      <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
          <i class="fab fa-google text-red-500"></i> Link Pendaftaran (Google Form)
        </h2>
        
        <div class="space-y-6">
          <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl">
            <div class="flex items-start gap-3">
              <i class="fas fa-exclamation-triangle text-amber-500 mt-0.5"></i>
              <div>
                <p class="text-sm font-medium text-amber-800">Penting: Link Google Form Wajib Diisi</p>
                <p class="text-sm text-amber-700 mt-1">Pendaftaran peserta akan dilakukan melalui Google Form yang Anda buat.</p>
              </div>
            </div>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Link Google Form Pendaftaran <span class="text-red-500">*</span></label>
            <div class="relative">
              <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                <i class="fab fa-google"></i>
              </span>
              <input type="url" name="link_pendaftaran" required placeholder="https://forms.google.com/..." class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
            </div>
          </div>
        </div>
      </div>

      <!-- Date & Time -->
      <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
          <i class="fas fa-calendar-alt text-green-500"></i> Tanggal & Waktu
        </h2>
        
        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pelaksanaan <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal_mulai" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Waktu Mulai <span class="text-red-500">*</span></label>
            <input type="time" name="waktu_mulai" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Waktu Selesai <span class="text-red-500">*</span></label>
            <input type="time" name="waktu_selesai" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Batas Pendaftaran <span class="text-red-500">*</span></label>
            <input type="datetime-local" name="batas_pendaftaran" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
        </div>
      </div>

      <!-- Location -->
      <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
          <i class="fas fa-map-marker-alt text-red-500"></i> Lokasi
        </h2>
        
        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Tempat <span class="text-red-500">*</span></label>
            <input type="text" name="lokasi" required placeholder="Contoh: Auditorium Gedung A, Lantai 3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
            <textarea name="alamat_lengkap" rows="2" placeholder="Alamat lengkap lokasi event..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition resize-none"></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Link Meeting Online (Jika Online/Hybrid)</label>
            <input type="url" name="link_meeting" placeholder="https://zoom.us/... atau https://meet.google.com/..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
        </div>
      </div>

      <!-- Quota & Price -->
      <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
          <i class="fas fa-users text-purple-500"></i> Kuota & Biaya
        </h2>
        
        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Kuota Peserta <span class="text-red-500">*</span></label>
            <input type="number" name="kuota" required placeholder="100" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Biaya Pendaftaran</label>
            <div class="relative">
              <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
              <input type="number" name="biaya" value="0" placeholder="0 (Gratis)" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
            </div>
          </div>
        </div>
        
        <div class="mt-6">
          <label class="block text-sm font-medium text-gray-700 mb-3">Benefit Peserta</label>
          <div class="grid md:grid-cols-2 gap-3">
            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
              <input type="checkbox" name="benefit[]" value="E-Sertifikat" class="w-5 h-5 text-primary rounded">
              <span class="text-gray-700">E-Sertifikat</span>
            </label>
            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
              <input type="checkbox" name="benefit[]" value="Materi" class="w-5 h-5 text-primary rounded">
              <span class="text-gray-700">Materi (PDF/PPT)</span>
            </label>
            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
              <input type="checkbox" name="benefit[]" value="Snack" class="w-5 h-5 text-primary rounded">
              <span class="text-gray-700">Snack & Coffee Break</span>
            </label>
            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
              <input type="checkbox" name="benefit[]" value="Networking" class="w-5 h-5 text-primary rounded">
              <span class="text-gray-700">Networking Session</span>
            </label>
          </div>
        </div>
      </div>

      <!-- Contact Person -->
      <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
          <i class="fas fa-phone text-primary"></i> Kontak Penanggung Jawab
        </h2>
        
        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama PIC <span class="text-red-500">*</span></label>
            <input type="text" name="nama_pic" required placeholder="Nama lengkap" value="<?= htmlspecialchars($_SESSION['nama']) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">No. WhatsApp <span class="text-red-500">*</span></label>
            <input type="tel" name="no_hp_pic" required placeholder="08xxxxxxxxxx" value="<?= htmlspecialchars($_SESSION['no_hp'] ?? '') ?>" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Email PIC <span class="text-red-500">*</span></label>
            <input type="email" name="email_pic" required placeholder="email@example.com" value="<?= htmlspecialchars($_SESSION['email']) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
        </div>
      </div>

      <!-- Additional Notes -->
      <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
          <i class="fas fa-sticky-note text-amber-500"></i> Catatan Tambahan
        </h2>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Catatan untuk Admin (Opsional)</label>
          <textarea name="catatan" rows="3" placeholder="Informasi tambahan yang perlu diketahui admin..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition resize-none"></textarea>
        </div>
      </div>

      <!-- Submit Buttons -->
      <div class="flex flex-col sm:flex-row gap-4">
        <button type="submit" class="flex-1 py-4 bg-primary text-white rounded-xl font-bold hover:bg-secondary transition flex items-center justify-center gap-2">
          <i class="fas fa-paper-plane"></i> Ajukan Event
        </button>
        <a href="dashboard.php" class="px-8 py-4 border border-gray-300 text-gray-600 rounded-xl font-bold hover:bg-gray-50 transition flex items-center justify-center gap-2">
          <i class="fas fa-times"></i> Batal
        </a>
      </div>
    </form>
  </main>
</body>
</html>
