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
        <a href="index.html" class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
            <i class="fas fa-calendar-alt text-white text-xl"></i>
          </div>
          <span class="font-bold text-xl text-dark">SIM-Event</span>
        </a>
        
        <div class="flex items-center gap-4">
          <a href="dashboard-panitia.html" class="text-gray-600 hover:text-primary">
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

    <!-- Info Box -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6 flex items-start gap-3">
      <i class="fas fa-info-circle text-primary mt-0.5"></i>
      <div>
        <p class="text-sm text-dark font-medium">Proses Pengajuan Event</p>
        <p class="text-sm text-gray-600 mt-1">Setelah Anda mengajukan event, admin pusat akan mereview dalam 1-3 hari kerja. Anda akan mendapat notifikasi jika event disetujui atau ditolak.</p>
      </div>
    </div>

    <form class="space-y-6">
      <!-- Basic Info -->
      <div class="bg-white rounded-2xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
          <i class="fas fa-info-circle text-primary"></i> Informasi Dasar
        </h2>
        
        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Event <span class="text-red-500">*</span></label>
            <input type="text" placeholder="Contoh: Seminar AI & Machine Learning" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
              <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition appearance-none bg-white">
                <option value="">Pilih Kategori</option>
                <option value="seminar">Seminar</option>
                <option value="workshop">Workshop</option>
                <option value="lomba">Lomba</option>
                <option value="talkshow">Talkshow</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Event <span class="text-red-500">*</span></label>
              <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition appearance-none bg-white">
                <option value="">Pilih Tipe</option>
                <option value="offline">Offline</option>
                <option value="online">Online</option>
                <option value="hybrid">Hybrid (Online & Offline)</option>
              </select>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Organisasi/Penyelenggara <span class="text-red-500">*</span></label>
            <input type="text" placeholder="Contoh: Himpunan Mahasiswa Teknik Informatika" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Event <span class="text-red-500">*</span></label>
            <textarea rows="5" placeholder="Jelaskan tentang event ini secara detail..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition resize-none"></textarea>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Poster/Banner Event</label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-primary transition cursor-pointer">
              <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
              <p class="text-gray-600">Drag & drop gambar atau <span class="text-primary font-medium">klik untuk upload</span></p>
              <p class="text-gray-400 text-sm mt-1">PNG, JPG hingga 5MB (Rekomendasi: 1200x630px)</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Added Google Form Link section for registration -->
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
                <p class="text-sm text-amber-700 mt-1">Pendaftaran peserta akan dilakukan melalui Google Form yang Anda buat. Pastikan form sudah siap sebelum mengajukan event.</p>
              </div>
            </div>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Link Google Form Pendaftaran <span class="text-red-500">*</span></label>
            <div class="relative">
              <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                <i class="fab fa-google"></i>
              </span>
              <input type="url" placeholder="https://forms.google.com/..." class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
            </div>
            <p class="text-xs text-gray-500 mt-2">
              <i class="fas fa-info-circle mr-1"></i>
              Contoh: https://docs.google.com/forms/d/e/xxxxx/viewform
            </p>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Link Spreadsheet Responses (Opsional)</label>
            <div class="relative">
              <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                <i class="fas fa-table"></i>
              </span>
              <input type="url" placeholder="https://docs.google.com/spreadsheets/..." class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
            </div>
            <p class="text-xs text-gray-500 mt-2">
              <i class="fas fa-info-circle mr-1"></i>
              Untuk memudahkan admin memantau jumlah pendaftar
            </p>
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
            <input type="date" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai (jika lebih dari 1 hari)</label>
            <input type="date" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Waktu Mulai <span class="text-red-500">*</span></label>
            <input type="time" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Waktu Selesai <span class="text-red-500">*</span></label>
            <input type="time" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Batas Pendaftaran <span class="text-red-500">*</span></label>
            <input type="datetime-local" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
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
            <input type="text" placeholder="Contoh: Auditorium Gedung A, Lantai 3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
            <textarea rows="2" placeholder="Alamat lengkap lokasi event..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition resize-none"></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Link Meeting Online (Jika Online/Hybrid)</label>
            <input type="url" placeholder="https://zoom.us/... atau https://meet.google.com/..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
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
            <input type="number" placeholder="100" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Biaya Pendaftaran</label>
            <div class="relative">
              <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
              <input type="number" placeholder="0 (Gratis)" class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
            </div>
          </div>
        </div>
        
        <div class="mt-6">
          <label class="block text-sm font-medium text-gray-700 mb-3">Benefit Peserta</label>
          <div class="grid md:grid-cols-2 gap-3">
            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
              <input type="checkbox" class="w-5 h-5 text-primary rounded">
              <span class="text-gray-700">E-Sertifikat</span>
            </label>
            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
              <input type="checkbox" class="w-5 h-5 text-primary rounded">
              <span class="text-gray-700">Materi (PDF/PPT)</span>
            </label>
            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
              <input type="checkbox" class="w-5 h-5 text-primary rounded">
              <span class="text-gray-700">Snack & Coffee Break</span>
            </label>
            <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50">
              <input type="checkbox" class="w-5 h-5 text-primary rounded">
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
            <input type="text" placeholder="Nama lengkap" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">No. WhatsApp <span class="text-red-500">*</span></label>
            <input type="tel" placeholder="08xxxxxxxxxx" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
          </div>
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Email PIC <span class="text-red-500">*</span></label>
            <input type="email" placeholder="email@example.com" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition">
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
          <textarea rows="3" placeholder="Informasi tambahan yang perlu diketahui admin..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition resize-none"></textarea>
        </div>
      </div>

      <!-- Submit Buttons -->
      <div class="flex flex-col sm:flex-row gap-4">
        <button type="submit" class="flex-1 py-4 bg-primary text-white rounded-xl font-bold hover:bg-secondary transition flex items-center justify-center gap-2">
          <i class="fas fa-paper-plane"></i> Ajukan Event
        </button>
        <button type="button" class="flex-1 py-4 bg-gray-200 text-gray-700 rounded-xl font-bold hover:bg-gray-300 transition flex items-center justify-center gap-2">
          <i class="fas fa-save"></i> Simpan Draft
        </button>
        <a href="dashboard-panitia.html" class="px-8 py-4 border border-gray-300 text-gray-600 rounded-xl font-bold hover:bg-gray-50 transition flex items-center justify-center gap-2">
          <i class="fas fa-times"></i> Batal
        </a>
      </div>
    </form>
  </main>
</body>
</html>
