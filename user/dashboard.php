<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Mahasiswa - SIM-Event Kampus</title>
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
  <!-- Sidebar -->
  <aside class="fixed left-0 top-0 h-full w-64 bg-dark text-white z-40 hidden lg:block">
    <div class="p-6">
      <div class="flex items-center space-x-2">
        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
          <i class="fas fa-calendar-check text-xl"></i>
        </div>
        <span class="font-bold text-lg">SIM-Event</span>
      </div>
    </div>
    
    <!-- Updated sidebar navigation - merged mahasiswa and panitia features -->
    <nav class="mt-6">
      <a href="#" class="flex items-center gap-3 px-6 py-3 bg-primary/20 border-r-4 border-primary text-white">
        <i class="fas fa-home w-5"></i> Dashboard
      </a>
      <a href="events.html" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-calendar w-5"></i> Jelajahi Event
      </a>
      <a href="#" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-clipboard-list w-5"></i> Event Terdaftar
      </a>
      <a href="ajukan-event.html" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-plus-circle w-5"></i> Ajukan Event
      </a>
      <a href="#" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-file-alt w-5"></i> Pengajuan Saya
      </a>
      <a href="#" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-certificate w-5"></i> Sertifikat
      </a>
      <a href="#" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-bell w-5"></i> Notifikasi
        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
      </a>
      <a href="#" class="flex items-center gap-3 px-6 py-3 text-gray-400 hover:text-white hover:bg-white/5 transition">
        <i class="fas fa-user w-5"></i> Profil
      </a>
    </nav>
    
    <div class="absolute bottom-0 left-0 right-0 p-6">
      <a href="index.html" class="flex items-center gap-3 text-gray-400 hover:text-white transition">
        <i class="fas fa-sign-out-alt w-5"></i> Keluar
      </a>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="lg:ml-64">
    <!-- Top Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-30">
      <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-4">
          <button class="lg:hidden text-gray-600">
            <i class="fas fa-bars text-xl"></i>
          </button>
          <h1 class="text-xl font-bold text-dark">Dashboard</h1>
        </div>
        
        <div class="flex items-center gap-4">
          <!-- Added ajukan event button in header -->
          <a href="ajukan-event.html" class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-secondary transition flex items-center gap-2">
            <i class="fas fa-plus"></i>
            <span class="hidden sm:inline">Ajukan Event</span>
          </a>
          
          <button class="relative text-gray-600 hover:text-primary">
            <i class="fas fa-bell text-xl"></i>
            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
          </button>
          
          <div class="flex items-center gap-3">
            <img src="/placeholder.svg?height=40&width=40" alt="Profile" class="w-10 h-10 rounded-full">
            <div class="hidden sm:block">
              <p class="font-semibold text-dark text-sm">John Doe</p>
              <p class="text-gray-500 text-xs">Teknik Informatika</p>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Dashboard Content -->
    <div class="p-6">
      <!-- Welcome Banner -->
      <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-6 text-white mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
          <div>
            <h2 class="text-2xl font-bold">Selamat Datang, John!</h2>
            <p class="text-blue-100 mt-2">Jelajahi event kampus atau ajukan event-mu sendiri.</p>
          </div>
          <div class="mt-4 md:mt-0 flex gap-3">
            <a href="events.html" class="px-5 py-2.5 bg-white text-primary rounded-xl font-semibold hover:bg-blue-50 transition inline-flex items-center gap-2">
              <i class="fas fa-compass"></i> Jelajahi Event
            </a>
            <a href="ajukan-event.html" class="px-5 py-2.5 bg-white/20 text-white rounded-xl font-semibold hover:bg-white/30 transition inline-flex items-center gap-2">
              <i class="fas fa-plus"></i> Ajukan Event
            </a>
          </div>
        </div>
      </div>

      <!-- Updated stats to include both participant and organizer stats -->
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-5 shadow-sm">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-calendar-check text-primary text-xl"></i>
            </div>
            <div>
              <p class="text-2xl font-bold text-dark">5</p>
              <p class="text-gray-500 text-sm">Event Diikuti</p>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl p-5 shadow-sm">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-check-circle text-green-500 text-xl"></i>
            </div>
            <div>
              <p class="text-2xl font-bold text-dark">3</p>
              <p class="text-gray-500 text-sm">Event Selesai</p>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl p-5 shadow-sm">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-paper-plane text-amber-500 text-xl"></i>
            </div>
            <div>
              <p class="text-2xl font-bold text-dark">2</p>
              <p class="text-gray-500 text-sm">Pengajuan Event</p>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl p-5 shadow-sm">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-certificate text-purple-500 text-xl"></i>
            </div>
            <div>
              <p class="text-2xl font-bold text-dark">3</p>
              <p class="text-gray-500 text-sm">Sertifikat</p>
            </div>
          </div>
        </div>
      </div>

      <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content Area -->
        <div class="lg:col-span-2 space-y-6">
          <!-- My Registered Events -->
          <div class="bg-white rounded-2xl shadow-sm">
            <div class="p-6 border-b flex items-center justify-between">
              <h3 class="text-lg font-bold text-dark">Event Terdaftar</h3>
              <a href="#" class="text-primary text-sm font-medium hover:underline">Lihat Semua</a>
            </div>
            
            <div class="divide-y">
              <!-- Event Item 1 -->
              <div class="p-6 hover:bg-gray-50 transition">
                <div class="flex gap-4">
                  <img src="/placeholder.svg?height=80&width=120" alt="Event" class="w-24 h-16 object-cover rounded-lg flex-shrink-0">
                  <div class="flex-1">
                    <div class="flex items-start justify-between">
                      <div>
                        <span class="text-xs font-medium text-primary bg-blue-100 px-2 py-0.5 rounded">Seminar</span>
                        <h4 class="font-semibold text-dark mt-1">Seminar AI & Machine Learning</h4>
                        <p class="text-gray-500 text-sm mt-1">
                          <i class="far fa-calendar mr-1"></i>20 Des 2025, 09:00 WIB
                        </p>
                      </div>
                      <span class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Menunggu</span>
                    </div>
                    <div class="flex items-center gap-3 mt-3">
                      <a href="event-detail.html" class="text-primary text-sm font-medium hover:underline">Lihat Detail</a>
                      <span class="text-gray-300">|</span>
                      <button class="text-red-500 text-sm font-medium hover:underline">Batalkan</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Event Item 2 -->
              <div class="p-6 hover:bg-gray-50 transition">
                <div class="flex gap-4">
                  <img src="/placeholder.svg?height=80&width=120" alt="Event" class="w-24 h-16 object-cover rounded-lg flex-shrink-0">
                  <div class="flex-1">
                    <div class="flex items-start justify-between">
                      <div>
                        <span class="text-xs font-medium text-green-700 bg-green-100 px-2 py-0.5 rounded">Workshop</span>
                        <h4 class="font-semibold text-dark mt-1">Workshop Web Development</h4>
                        <p class="text-gray-500 text-sm mt-1">
                          <i class="far fa-calendar mr-1"></i>22 Des 2025, 13:00 WIB
                        </p>
                      </div>
                      <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Terkonfirmasi</span>
                    </div>
                    <div class="flex items-center gap-3 mt-3">
                      <a href="event-detail.html" class="text-primary text-sm font-medium hover:underline">Lihat Detail</a>
                      <span class="text-gray-300">|</span>
                      <span class="text-gray-500 text-sm">Kode: <span class="font-mono font-semibold">WEB2025</span></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Added section for pengajuan event status -->
          <div class="bg-white rounded-2xl shadow-sm">
            <div class="p-6 border-b flex items-center justify-between">
              <h3 class="text-lg font-bold text-dark">Status Pengajuan Event Saya</h3>
              <a href="ajukan-event.html" class="text-primary text-sm font-medium hover:underline flex items-center gap-1">
                <i class="fas fa-plus text-xs"></i> Ajukan Baru
              </a>
            </div>
            
            <div class="divide-y">
              <!-- Pending Submission -->
              <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-amber-500 text-xl"></i>
                  </div>
                  <div>
                    <p class="font-semibold text-dark">Workshop React.js untuk Pemula</p>
                    <p class="text-sm text-gray-500">Diajukan 2 hari lalu</p>
                  </div>
                </div>
                <span class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Menunggu Review</span>
              </div>
              
              <!-- Approved Submission -->
              <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                  </div>
                  <div>
                    <p class="font-semibold text-dark">Seminar Cyber Security</p>
                    <p class="text-sm text-gray-500">Disetujui 5 hari lalu</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Disetujui</span>
                  <a href="#" class="text-primary text-sm hover:underline ml-2">Kelola</a>
                </div>
              </div>
              
              <!-- Rejected Submission -->
              <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-times-circle text-red-500 text-xl"></i>
                  </div>
                  <div>
                    <p class="font-semibold text-dark">Lomba Desain Poster</p>
                    <p class="text-sm text-gray-500">Ditolak - Jadwal bentrok dengan event lain</p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full">Ditolak</span>
                  <button class="text-primary text-sm hover:underline ml-2">Ajukan Ulang</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
          <!-- Upcoming Event -->
          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Event Terdekat</h3>
            <div class="bg-gradient-to-br from-primary to-secondary rounded-xl p-4 text-white">
              <span class="text-xs bg-white/20 px-2 py-0.5 rounded">Seminar</span>
              <h4 class="font-semibold mt-2">Seminar AI & Machine Learning</h4>
              <div class="flex items-center gap-2 mt-3 text-sm text-blue-100">
                <i class="far fa-calendar"></i>
                <span>20 Des 2025</span>
              </div>
              <div class="flex items-center gap-2 mt-1 text-sm text-blue-100">
                <i class="far fa-clock"></i>
                <span>09:00 WIB</span>
              </div>
              <div class="mt-4 p-3 bg-white/10 rounded-lg">
                <p class="text-xs text-blue-100">Waktu tersisa:</p>
                <div class="flex gap-2 mt-1">
                  <div class="text-center">
                    <p class="text-xl font-bold">05</p>
                    <p class="text-xs text-blue-200">Hari</p>
                  </div>
                  <span class="text-xl font-bold">:</span>
                  <div class="text-center">
                    <p class="text-xl font-bold">12</p>
                    <p class="text-xs text-blue-200">Jam</p>
                  </div>
                  <span class="text-xl font-bold">:</span>
                  <div class="text-center">
                    <p class="text-xl font-bold">30</p>
                    <p class="text-xs text-blue-200">Menit</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick Actions -->
          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
              <a href="events.html" class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl hover:bg-blue-100 transition">
                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                  <i class="fas fa-search text-white"></i>
                </div>
                <span class="font-medium text-dark">Cari Event</span>
              </a>
              <a href="ajukan-event.html" class="flex items-center gap-3 p-3 bg-amber-50 rounded-xl hover:bg-amber-100 transition">
                <div class="w-10 h-10 bg-amber-500 rounded-lg flex items-center justify-center">
                  <i class="fas fa-plus text-white"></i>
                </div>
                <span class="font-medium text-dark">Ajukan Event Baru</span>
              </a>
              <a href="calendar.html" class="flex items-center gap-3 p-3 bg-green-50 rounded-xl hover:bg-green-100 transition">
                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                  <i class="fas fa-calendar-alt text-white"></i>
                </div>
                <span class="font-medium text-dark">Lihat Kalender</span>
              </a>
            </div>
          </div>

          <!-- Notifications -->
          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Notifikasi Terbaru</h3>
            <div class="space-y-4">
              <div class="flex gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                  <i class="fas fa-check text-green-500"></i>
                </div>
                <div>
                  <p class="text-sm text-dark">Pengajuan <span class="font-semibold">Seminar Cyber Security</span> disetujui!</p>
                  <p class="text-xs text-gray-500 mt-1">5 hari yang lalu</p>
                </div>
              </div>
              <div class="flex gap-3">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                  <i class="fas fa-bell text-primary"></i>
                </div>
                <div>
                  <p class="text-sm text-dark">Event <span class="font-semibold">Seminar AI</span> akan dimulai dalam 5 hari</p>
                  <p class="text-xs text-gray-500 mt-1">1 hari yang lalu</p>
                </div>
              </div>
              <div class="flex gap-3">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                  <i class="fas fa-times text-red-500"></i>
                </div>
                <div>
                  <p class="text-sm text-dark">Pengajuan <span class="font-semibold">Lomba Desain Poster</span> ditolak</p>
                  <p class="text-xs text-gray-500 mt-1">3 hari yang lalu</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Status Guide -->
          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Panduan Status</h3>
            <div class="space-y-3 text-sm">
              <div class="flex items-center gap-3">
                <span class="px-2 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Menunggu</span>
                <span class="text-gray-600">Dalam review admin</span>
              </div>
              <div class="flex items-center gap-3">
                <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Disetujui</span>
                <span class="text-gray-600">Event siap berjalan</span>
              </div>
              <div class="flex items-center gap-3">
                <span class="px-2 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full">Ditolak</span>
                <span class="text-gray-600">Tidak disetujui</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
