<!-- Main Content -->
  <main class="lg:ml-64">
    <!-- Top Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-30">
      <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-4">
          <button class="lg:hidden text-gray-600">
            <i class="fas fa-bars text-xl"></i>
          </button>
          <div>
            <h1 class="text-xl font-bold text-dark">Review Pengajuan Event</h1>
            <p class="text-sm text-gray-500">Detail pengajuan dari panitia</p>
          </div>
        </div>
        <a href="./?p=dashboard" class="text-gray-600 hover:text-primary flex items-center gap-2">
          <i class="fas fa-arrow-left"></i> Kembali
        </a>
      </div>
    </header>

    <!-- Review Content -->
    <div class="p-6">
      <div class="max-w-4xl">
        <!-- Status Banner -->
        <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-6 flex items-center justify-between">
          <div class="flex items-center gap-3">
            <i class="fas fa-clock text-amber-500 text-xl"></i>
            <div>
              <p class="font-semibold text-dark">Menunggu Persetujuan</p>
              <p class="text-sm text-gray-600">Diajukan oleh Himpunan TI pada 10 Des 2025, 14:30</p>
            </div>
          </div>
          <span class="px-4 py-2 bg-amber-100 text-amber-700 text-sm font-medium rounded-full">Pending</span>
        </div>

        <!-- Event Details -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
          <h2 class="text-lg font-bold text-dark mb-6 flex items-center gap-2">
            <i class="fas fa-info-circle text-primary"></i> Detail Event yang Diajukan
          </h2>
          
          <!-- Event Header -->
          <div class="flex flex-col md:flex-row gap-6 mb-6">
            <div class="w-full md:w-64 h-40 bg-gray-100 rounded-xl flex items-center justify-center">
              <img src="/placeholder.svg?height=160&width=256" alt="Event Poster" class="w-full h-full object-cover rounded-xl">
            </div>
            <div class="flex-1">
              <span class="px-3 py-1 bg-blue-100 text-primary text-xs font-medium rounded-full">Seminar</span>
              <h3 class="text-2xl font-bold text-dark mt-2">Seminar AI & Machine Learning</h3>
              <p class="text-gray-600 mt-2">Seminar tentang perkembangan terkini dalam bidang Artificial Intelligence dan Machine Learning serta aplikasinya dalam dunia industri.</p>
              
              <div class="flex flex-wrap gap-4 mt-4">
                <div class="flex items-center gap-2 text-sm text-gray-600">
                  <i class="fas fa-building text-primary"></i>
                  <span>Himpunan TI</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                  <i class="fas fa-map-marker-alt text-red-500"></i>
                  <span>Offline</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <h4 class="font-semibold text-dark mb-3">Waktu & Tempat</h4>
              <div class="space-y-2 text-sm">
                <div class="flex items-center gap-3">
                  <i class="fas fa-calendar text-gray-400 w-5"></i>
                  <span class="text-gray-600">20 Desember 2025</span>
                </div>
                <div class="flex items-center gap-3">
                  <i class="fas fa-clock text-gray-400 w-5"></i>
                  <span class="text-gray-600">09:00 - 12:00 WIB</span>
                </div>
                <div class="flex items-center gap-3">
                  <i class="fas fa-map-marker-alt text-gray-400 w-5"></i>
                  <span class="text-gray-600">Auditorium Gedung A Lt. 3</span>
                </div>
                <div class="flex items-center gap-3">
                  <i class="fas fa-hourglass-end text-gray-400 w-5"></i>
                  <span class="text-gray-600">Batas Daftar: 18 Des 2025</span>
                </div>
              </div>
            </div>
            
            <div>
              <h4 class="font-semibold text-dark mb-3">Kuota & Biaya</h4>
              <div class="space-y-2 text-sm">
                <div class="flex items-center gap-3">
                  <i class="fas fa-users text-gray-400 w-5"></i>
                  <span class="text-gray-600">Kuota: 200 peserta</span>
                </div>
                <div class="flex items-center gap-3">
                  <i class="fas fa-ticket-alt text-gray-400 w-5"></i>
                  <span class="text-gray-600">Biaya: Gratis</span>
                </div>
              </div>
              
              <h4 class="font-semibold text-dark mt-4 mb-3">Benefit</h4>
              <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full">E-Sertifikat</span>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full">Materi PDF</span>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full">Snack</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Person -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
          <h2 class="text-lg font-bold text-dark mb-4 flex items-center gap-2">
            <i class="fas fa-user text-green-500"></i> Penanggung Jawab
          </h2>
          
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
              <span class="font-bold text-primary text-lg">AR</span>
            </div>
            <div>
              <p class="font-semibold text-dark">Ahmad Rizki</p>
              <p class="text-sm text-gray-500">Ketua Panitia - Himpunan TI</p>
              <div class="flex items-center gap-4 mt-2 text-sm">
                <span class="text-gray-600"><i class="fas fa-phone mr-2"></i>081234567890</span>
                <span class="text-gray-600"><i class="fas fa-envelope mr-2"></i>ahmad@email.com</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Admin Notes -->
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
          <h2 class="text-lg font-bold text-dark mb-4 flex items-center gap-2">
            <i class="fas fa-sticky-note text-amber-500"></i> Catatan Admin
          </h2>
          
          <textarea rows="4" placeholder="Tambahkan catatan untuk pengaju (opsional)..." class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition resize-none"></textarea>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4">
          <button class="flex-1 py-4 bg-green-500 text-white rounded-xl font-bold hover:bg-green-600 transition flex items-center justify-center gap-2">
            <i class="fas fa-check-circle"></i> Setujui Event
          </button>
          <button class="flex-1 py-4 bg-red-500 text-white rounded-xl font-bold hover:bg-red-600 transition flex items-center justify-center gap-2">
            <i class="fas fa-times-circle"></i> Tolak Event
          </button>
          <button class="px-8 py-4 bg-amber-500 text-white rounded-xl font-bold hover:bg-amber-600 transition flex items-center justify-center gap-2">
            <i class="fas fa-edit"></i> Minta Revisi
          </button>
        </div>
      </div>
    </div>
  </main>
</body>
