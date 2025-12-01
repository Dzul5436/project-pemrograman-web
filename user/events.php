<!-- Header -->
  <section class="bg-gradient-to-r from-primary to-secondary py-12">
    <div class="max-w-7xl mx-auto px-4">
      <h1 class="text-3xl md:text-4xl font-bold text-white">Daftar Event</h1>
      <p class="text-blue-100 mt-2">Temukan dan ikuti event-event menarik di kampus</p>
      
      <!-- Search & Filter -->
      <div class="mt-8 bg-white rounded-2xl p-4 shadow-lg">
        <div class="grid md:grid-cols-4 gap-4">
          <div class="md:col-span-2 relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
              <i class="fas fa-search"></i>
            </span>
            <input type="text" placeholder="Cari event..." class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
          </div>
          <div class="relative">
            <select class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none appearance-none bg-white">
              <option value="">Semua Kategori</option>
              <option value="seminar">Seminar</option>
              <option value="workshop">Workshop</option>
              <option value="lomba">Lomba</option>
              <option value="talkshow">Talkshow</option>
            </select>
          </div>
          <div class="relative">
            <select class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none appearance-none bg-white">
              <option value="">Semua Status</option>
              <option value="upcoming">Akan Datang</option>
              <option value="ongoing">Sedang Berlangsung</option>
              <option value="past">Selesai</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Event Categories -->
  <section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex flex-wrap gap-3">
        <button class="px-5 py-2 bg-primary text-white rounded-full font-medium">Semua</button>
        <button class="px-5 py-2 bg-gray-100 text-gray-700 rounded-full font-medium hover:bg-blue-100 hover:text-primary transition flex items-center gap-2">
          <i class="fas fa-microphone"></i> Seminar
        </button>
        <button class="px-5 py-2 bg-gray-100 text-gray-700 rounded-full font-medium hover:bg-green-100 hover:text-green-600 transition flex items-center gap-2">
          <i class="fas fa-laptop-code"></i> Workshop
        </button>
        <button class="px-5 py-2 bg-gray-100 text-gray-700 rounded-full font-medium hover:bg-purple-100 hover:text-purple-600 transition flex items-center gap-2">
          <i class="fas fa-trophy"></i> Lomba
        </button>
        <button class="px-5 py-2 bg-gray-100 text-gray-700 rounded-full font-medium hover:bg-amber-100 hover:text-amber-600 transition flex items-center gap-2">
          <i class="fas fa-comments"></i> Talkshow
        </button>
      </div>
    </div>
  </section>

  <!-- Events Grid -->
  <section class="py-12">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex items-center justify-between mb-8">
        <p class="text-gray-600">Menampilkan <span class="font-semibold text-dark">12 event</span></p>
        <div class="flex items-center gap-2">
          <span class="text-gray-500 text-sm">Urutkan:</span>
          <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-primary outline-none">
            <option>Terbaru</option>
            <option>Terdekat</option>
            <option>Populer</option>
          </select>
        </div>
      </div>
      
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Event Card 1 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
          <div class="relative">
            <img src="/placeholder.svg?height=200&width=400" alt="Seminar AI" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
            <span class="absolute top-4 left-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">Seminar</span>
            <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Gratis</span>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
              <span class="flex items-center gap-1"><i class="far fa-calendar"></i> 20 Des 2025</span>
              <span class="flex items-center gap-1"><i class="far fa-clock"></i> 09:00 WIB</span>
            </div>
            <h3 class="text-xl font-bold text-dark mb-2">Seminar AI & Machine Learning</h3>
            <p class="text-gray-600 text-sm mb-4">Pelajari dasar-dasar AI dan implementasinya dalam industri.</p>
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center gap-2">
                <img src="/placeholder.svg?height=32&width=32" alt="Organizer" class="w-8 h-8 rounded-full">
                <span class="text-sm text-gray-600">Himpunan TI</span>
              </div>
            </div>
            <div class="flex gap-2">
              <a href="event-detail.html" class="flex-1 text-center py-3 border-2 border-primary text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition">Detail</a>
              <a href="https://forms.google.com/example" target="_blank" class="flex-1 text-center py-3 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
                <i class="fab fa-google text-sm"></i> Daftar
              </a>
            </div>
          </div>
        </div>
        
        <!-- Event Card 2 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
          <div class="relative">
            <img src="/placeholder.svg?height=200&width=400" alt="Workshop" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
            <span class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Workshop</span>
            <span class="absolute top-4 right-4 bg-accent text-dark px-3 py-1 rounded-full text-sm font-medium">Rp 50K</span>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
              <span class="flex items-center gap-1"><i class="far fa-calendar"></i> 22 Des 2025</span>
              <span class="flex items-center gap-1"><i class="far fa-clock"></i> 13:00 WIB</span>
            </div>
            <h3 class="text-xl font-bold text-dark mb-2">Workshop Web Development</h3>
            <p class="text-gray-600 text-sm mb-4">Belajar membuat website dari nol dengan HTML, CSS, JS.</p>
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center gap-2">
                <img src="/placeholder.svg?height=32&width=32" alt="Organizer" class="w-8 h-8 rounded-full">
                <span class="text-sm text-gray-600">UKM Programming</span>
              </div>
            </div>
            <div class="flex gap-2">
              <a href="event-detail.html" class="flex-1 text-center py-3 border-2 border-primary text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition">Detail</a>
              <a href="https://forms.google.com/example" target="_blank" class="flex-1 text-center py-3 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
                <i class="fab fa-google text-sm"></i> Daftar
              </a>
            </div>
          </div>
        </div>
        
        <!-- Event Card 3 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
          <div class="relative">
            <img src="/placeholder.svg?height=200&width=400" alt="Lomba" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
            <span class="absolute top-4 left-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-medium">Lomba</span>
            <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Gratis</span>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
              <span class="flex items-center gap-1"><i class="far fa-calendar"></i> 25 Des 2025</span>
              <span class="flex items-center gap-1"><i class="far fa-clock"></i> 08:00 WIB</span>
            </div>
            <h3 class="text-xl font-bold text-dark mb-2">UI/UX Design Competition</h3>
            <p class="text-gray-600 text-sm mb-4">Tunjukkan kreativitasmu dalam mendesain aplikasi.</p>
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center gap-2">
                <img src="/placeholder.svg?height=32&width=32" alt="Organizer" class="w-8 h-8 rounded-full">
                <span class="text-sm text-gray-600">BEM Fakultas</span>
              </div>
            </div>
            <div class="flex gap-2">
              <a href="event-detail.html" class="flex-1 text-center py-3 border-2 border-primary text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition">Detail</a>
              <a href="https://forms.google.com/example" target="_blank" class="flex-1 text-center py-3 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
                <i class="fab fa-google text-sm"></i> Daftar
              </a>
            </div>
          </div>
        </div>
        
        <!-- Event Card 4 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
          <div class="relative">
            <img src="/placeholder.svg?height=200&width=400" alt="Talkshow" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
            <span class="absolute top-4 left-4 bg-amber-500 text-white px-3 py-1 rounded-full text-sm font-medium">Talkshow</span>
            <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Gratis</span>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
              <span class="flex items-center gap-1"><i class="far fa-calendar"></i> 28 Des 2025</span>
              <span class="flex items-center gap-1"><i class="far fa-clock"></i> 10:00 WIB</span>
            </div>
            <h3 class="text-xl font-bold text-dark mb-2">Talkshow: Membangun Startup</h3>
            <p class="text-gray-600 text-sm mb-4">Diskusi bersama founder startup sukses Indonesia.</p>
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center gap-2">
                <img src="/placeholder.svg?height=32&width=32" alt="Organizer" class="w-8 h-8 rounded-full">
                <span class="text-sm text-gray-600">UKM Entrepreneur</span>
              </div>
            </div>
            <div class="flex gap-2">
              <a href="event-detail.html" class="flex-1 text-center py-3 border-2 border-primary text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition">Detail</a>
              <a href="https://forms.google.com/example" target="_blank" class="flex-1 text-center py-3 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
                <i class="fab fa-google text-sm"></i> Daftar
              </a>
            </div>
          </div>
        </div>
        
        <!-- Event Card 5 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
          <div class="relative">
            <img src="/placeholder.svg?height=200&width=400" alt="Seminar" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
            <span class="absolute top-4 left-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">Seminar</span>
            <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Gratis</span>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
              <span class="flex items-center gap-1"><i class="far fa-calendar"></i> 5 Jan 2026</span>
              <span class="flex items-center gap-1"><i class="far fa-clock"></i> 09:00 WIB</span>
            </div>
            <h3 class="text-xl font-bold text-dark mb-2">Cybersecurity Awareness</h3>
            <p class="text-gray-600 text-sm mb-4">Pelajari cara melindungi data dan sistem dari ancaman cyber.</p>
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center gap-2">
                <img src="/placeholder.svg?height=32&width=32" alt="Organizer" class="w-8 h-8 rounded-full">
                <span class="text-sm text-gray-600">Lab Keamanan</span>
              </div>
            </div>
            <div class="flex gap-2">
              <a href="event-detail.html" class="flex-1 text-center py-3 border-2 border-primary text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition">Detail</a>
              <a href="https://forms.google.com/example" target="_blank" class="flex-1 text-center py-3 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
                <i class="fab fa-google text-sm"></i> Daftar
              </a>
            </div>
          </div>
        </div>
        
        <!-- Event Card 6 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
          <div class="relative">
            <img src="/placeholder.svg?height=200&width=400" alt="Workshop" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
            <span class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Workshop</span>
            <span class="absolute top-4 right-4 bg-accent text-dark px-3 py-1 rounded-full text-sm font-medium">Rp 75K</span>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
              <span class="flex items-center gap-1"><i class="far fa-calendar"></i> 10 Jan 2026</span>
              <span class="flex items-center gap-1"><i class="far fa-clock"></i> 13:00 WIB</span>
            </div>
            <h3 class="text-xl font-bold text-dark mb-2">Workshop Flutter Development</h3>
            <p class="text-gray-600 text-sm mb-4">Bangun aplikasi mobile cross-platform dengan Flutter.</p>
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center gap-2">
                <img src="/placeholder.svg?height=32&width=32" alt="Organizer" class="w-8 h-8 rounded-full">
                <span class="text-sm text-gray-600">GDSC Kampus</span>
              </div>
            </div>
            <div class="flex gap-2">
              <a href="event-detail.html" class="flex-1 text-center py-3 border-2 border-primary text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition">Detail</a>
              <a href="https://forms.google.com/example" target="_blank" class="flex-1 text-center py-3 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
                <i class="fab fa-google text-sm"></i> Daftar
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Pagination -->
      <div class="flex justify-center mt-12">
        <nav class="flex items-center gap-2">
          <button class="w-10 h-10 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 hover:bg-gray-50">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="w-10 h-10 rounded-lg bg-primary text-white font-medium">1</button>
          <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium">2</button>
          <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium">3</button>
          <span class="px-2 text-gray-400">...</span>
          <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium">10</button>
          <button class="w-10 h-10 rounded-lg border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-gray-50">
            <i class="fas fa-chevron-right"></i>
          </button>
        </nav>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-12">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <div class="flex items-center justify-center space-x-2 mb-4">
        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
          <i class="fas fa-calendar-check text-xl"></i>
        </div>
        <span class="font-bold text-xl">SIM-Event Kampus</span>
      </div>
      <p class="text-gray-400">&copy; 2025 SIM-Event Kampus. All rights reserved.</p>
    </div>
  </footer>
</body>
