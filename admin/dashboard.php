<!-- Main Content -->
  <main class="lg:ml-64">
    <!-- Top Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-30">
      <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-4">
          <button class="lg:hidden text-gray-600">
            <i class="fas fa-bars text-xl"></i>
          </button>
          <h1 class="text-xl font-bold text-dark">Dashboard Admin Pusat</h1>
        </div>
        
        <div class="flex items-center gap-4">
          <button class="relative text-gray-600 hover:text-primary">
            <i class="fas fa-bell text-xl"></i>
            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">5</span>
          </button>
          
          <div class="flex items-center gap-3">
            <img src="/placeholder.svg?height=40&width=40" alt="Profile" class="w-10 h-10 rounded-full">
            <div class="hidden sm:block">
              <p class="font-semibold text-dark text-sm">Super Admin</p>
              <p class="text-gray-500 text-xs">Administrator</p>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Dashboard Content -->
    <div class="p-6">
      <!-- Updated stats cards for admin approval system -->
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-amber-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 text-sm">Menunggu Persetujuan</p>
              <p class="text-3xl font-bold text-dark mt-1">5</p>
              <p class="text-amber-500 text-xs mt-1">Butuh review</p>
            </div>
            <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-clock text-amber-500 text-2xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-green-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 text-sm">Event Disetujui</p>
              <p class="text-3xl font-bold text-dark mt-1">28</p>
              <p class="text-green-500 text-xs mt-1">+8 bulan ini</p>
            </div>
            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-check-circle text-green-500 text-2xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-red-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 text-sm">Event Ditolak</p>
              <p class="text-3xl font-bold text-dark mt-1">3</p>
              <p class="text-gray-500 text-xs mt-1">Bulan ini</p>
            </div>
            <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-times-circle text-red-500 text-2xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-primary">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 text-sm">Event Berlangsung</p>
              <p class="text-3xl font-bold text-dark mt-1">4</p>
              <p class="text-primary text-xs mt-1">Sedang aktif</p>
            </div>
            <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-play-circle text-primary text-2xl"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="grid lg:grid-cols-3 gap-8">
        <!-- Updated table to show pending event requests without participant count -->
        <div class="lg:col-span-2">
          <div class="bg-white rounded-2xl shadow-sm">
            <div class="p-6 border-b flex items-center justify-between">
              <h3 class="text-lg font-bold text-dark">Pengajuan Event Terbaru</h3>
              <span class="px-3 py-1 bg-amber-100 text-amber-700 text-sm font-medium rounded-full">5 Menunggu</span>
            </div>
            
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Event</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Pengaju</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Tanggal Event</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                  </tr>
                </thead>
                <tbody class="divide-y">
                  <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                          <i class="fas fa-microphone text-primary"></i>
                        </div>
                        <div>
                          <p class="font-medium text-dark">Seminar AI & ML</p>
                          <p class="text-xs text-gray-500">Seminar</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div>
                        <p class="text-sm font-medium text-dark">Himpunan TI</p>
                        <p class="text-xs text-gray-500">Diajukan 2 jam lalu</p>
                      </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">20 Des 2025</td>
                    <td class="px-6 py-4">
                      <span class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Menunggu</span>
                    </td>
                    <td class="px-6 py-4">
                      <div class="flex items-center gap-2">
                        <button class="p-2 text-gray-400 hover:text-primary transition" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-green-500 transition" title="Setujui">
                          <i class="fas fa-check"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-500 transition" title="Tolak">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                          <i class="fas fa-laptop-code text-green-500"></i>
                        </div>
                        <div>
                          <p class="font-medium text-dark">Workshop Web Dev</p>
                          <p class="text-xs text-gray-500">Workshop</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div>
                        <p class="text-sm font-medium text-dark">UKM Programming</p>
                        <p class="text-xs text-gray-500">Diajukan 5 jam lalu</p>
                      </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">22 Des 2025</td>
                    <td class="px-6 py-4">
                      <span class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Menunggu</span>
                    </td>
                    <td class="px-6 py-4">
                      <div class="flex items-center gap-2">
                        <button class="p-2 text-gray-400 hover:text-primary transition" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-green-500 transition" title="Setujui">
                          <i class="fas fa-check"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-500 transition" title="Tolak">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                          <i class="fas fa-trophy text-purple-500"></i>
                        </div>
                        <div>
                          <p class="font-medium text-dark">Lomba UI/UX Design</p>
                          <p class="text-xs text-gray-500">Lomba</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div>
                        <p class="text-sm font-medium text-dark">BEM Fakultas</p>
                        <p class="text-xs text-gray-500">Diajukan 1 hari lalu</p>
                      </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">25 Des 2025</td>
                    <td class="px-6 py-4">
                      <span class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">Menunggu</span>
                    </td>
                    <td class="px-6 py-4">
                      <div class="flex items-center gap-2">
                        <button class="p-2 text-gray-400 hover:text-primary transition" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-green-500 transition" title="Setujui">
                          <i class="fas fa-check"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-500 transition" title="Tolak">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <div class="p-4 border-t text-center">
              <a href="#" class="text-primary font-medium hover:underline">Lihat Semua Pengajuan</a>
            </div>
          </div>
          
          <!-- Added recently approved events section -->
          <div class="bg-white rounded-2xl shadow-sm mt-6">
            <div class="p-6 border-b flex items-center justify-between">
              <h3 class="text-lg font-bold text-dark">Event Baru Disetujui</h3>
              <a href="#" class="text-primary text-sm font-medium hover:underline">Lihat Semua</a>
            </div>
            
            <div class="divide-y">
              <div class="p-4 flex items-center justify-between hover:bg-gray-50">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check text-green-500"></i>
                  </div>
                  <div>
                    <p class="font-medium text-dark">Talkshow Karir IT</p>
                    <p class="text-xs text-gray-500">Disetujui 30 menit lalu</p>
                  </div>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Disetujui</span>
              </div>
              <div class="p-4 flex items-center justify-between hover:bg-gray-50">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check text-green-500"></i>
                  </div>
                  <div>
                    <p class="font-medium text-dark">Workshop Data Science</p>
                    <p class="text-xs text-gray-500">Disetujui 2 jam lalu</p>
                  </div>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Disetujui</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
          <!-- Quick Stats -->
          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Ringkasan Bulan Ini</h3>
            <div class="space-y-4">
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Total Pengajuan</span>
                <span class="font-bold text-dark">36</span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Disetujui</span>
                <span class="font-bold text-green-500">28</span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Ditolak</span>
                <span class="font-bold text-red-500">3</span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-gray-600">Menunggu</span>
                <span class="font-bold text-amber-500">5</span>
              </div>
              <div class="h-2 bg-gray-200 rounded-full mt-2 overflow-hidden flex">
                <div class="h-full bg-green-500" style="width: 78%"></div>
                <div class="h-full bg-red-500" style="width: 8%"></div>
                <div class="h-full bg-amber-500" style="width: 14%"></div>
              </div>
              <p class="text-xs text-gray-500 text-center">78% tingkat persetujuan</p>
            </div>
          </div>

          <!-- Recent Submissions -->
          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Pengaju Aktif</h3>
            <div class="space-y-4">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                  <span class="font-bold text-primary text-sm">TI</span>
                </div>
                <div class="flex-1">
                  <p class="font-medium text-dark text-sm">Himpunan TI</p>
                  <p class="text-xs text-gray-500">12 event diajukan</p>
                </div>
              </div>
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                  <span class="font-bold text-green-500 text-sm">UP</span>
                </div>
                <div class="flex-1">
                  <p class="font-medium text-dark text-sm">UKM Programming</p>
                  <p class="text-xs text-gray-500">8 event diajukan</p>
                </div>
              </div>
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                  <span class="font-bold text-purple-500 text-sm">BM</span>
                </div>
                <div class="flex-1">
                  <p class="font-medium text-dark text-sm">BEM Fakultas</p>
                  <p class="text-xs text-gray-500">6 event diajukan</p>
                </div>
              </div>
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                  <span class="font-bold text-amber-500 text-sm">SI</span>
                </div>
                <div class="flex-1">
                  <p class="font-medium text-dark text-sm">Himpunan SI</p>
                  <p class="text-xs text-gray-500">5 event diajukan</p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Notifications -->
          <div class="bg-white rounded-2xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Notifikasi</h3>
            <div class="space-y-3">
              <div class="flex items-start gap-3 p-3 bg-amber-50 rounded-xl">
                <i class="fas fa-exclamation-circle text-amber-500 mt-0.5"></i>
                <div>
                  <p class="text-sm text-dark">5 pengajuan event menunggu persetujuan</p>
                  <p class="text-xs text-gray-500 mt-1">Segera review</p>
                </div>
              </div>
              <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-xl">
                <i class="fas fa-info-circle text-primary mt-0.5"></i>
                <div>
                  <p class="text-sm text-dark">2 event akan berlangsung minggu ini</p>
                  <p class="text-xs text-gray-500 mt-1">Pastikan semua siap</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>