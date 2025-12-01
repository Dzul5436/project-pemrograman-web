<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalender Event - SIM-Event Kampus</title>
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
<body class="bg-gray-50 min-h-screen">
  <!-- Navbar -->
  <nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center h-16">
        <div class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
            <i class="fas fa-calendar-check text-white text-xl"></i>
          </div>
          <span class="font-bold text-xl text-dark">SIM-Event Kampus</span>
        </div>
        
        <div class="hidden md:flex items-center space-x-8">
          <a href="index.html" class="text-gray-600 hover:text-primary transition">Beranda</a>
          <a href="events.html" class="text-gray-600 hover:text-primary transition">Daftar Event</a>
          <a href="calendar.html" class="text-primary font-semibold">Kalender</a>
          <a href="about.html" class="text-gray-600 hover:text-primary transition">Tentang</a>
        </div>
        
        <div class="flex items-center space-x-3">
          <a href="login.html" class="px-4 py-2 text-primary border-2 border-primary rounded-lg hover:bg-primary hover:text-white transition font-medium">Masuk</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <section class="bg-gradient-to-r from-primary to-secondary py-8">
    <div class="max-w-7xl mx-auto px-4">
      <h1 class="text-3xl font-bold text-white">Kalender Event</h1>
      <p class="text-blue-100 mt-2">Lihat jadwal semua event dalam satu tampilan</p>
    </div>
  </section>

  <!-- Calendar Section -->
  <section class="py-8">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid lg:grid-cols-3 gap-8">
        <!-- Calendar -->
        <div class="lg:col-span-2">
          <div class="bg-white rounded-2xl shadow-lg p-6">
            <!-- Calendar Header -->
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-2xl font-bold text-dark">Desember 2025</h2>
              <div class="flex items-center gap-2">
                <button class="w-10 h-10 rounded-lg border border-gray-200 flex items-center justify-center hover:bg-gray-50 transition">
                  <i class="fas fa-chevron-left text-gray-600"></i>
                </button>
                <button class="px-4 py-2 bg-primary text-white rounded-lg font-medium">Hari Ini</button>
                <button class="w-10 h-10 rounded-lg border border-gray-200 flex items-center justify-center hover:bg-gray-50 transition">
                  <i class="fas fa-chevron-right text-gray-600"></i>
                </button>
              </div>
            </div>
            
            <!-- Calendar Grid -->
            <div class="grid grid-cols-7 gap-1">
              <!-- Day Headers -->
              <div class="text-center py-3 text-sm font-semibold text-gray-500">Min</div>
              <div class="text-center py-3 text-sm font-semibold text-gray-500">Sen</div>
              <div class="text-center py-3 text-sm font-semibold text-gray-500">Sel</div>
              <div class="text-center py-3 text-sm font-semibold text-gray-500">Rab</div>
              <div class="text-center py-3 text-sm font-semibold text-gray-500">Kam</div>
              <div class="text-center py-3 text-sm font-semibold text-gray-500">Jum</div>
              <div class="text-center py-3 text-sm font-semibold text-gray-500">Sab</div>
              
              <!-- Empty cells for previous month -->
              <div class="aspect-square p-1"></div>
              
              <!-- Days -->
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">1</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">2</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">3</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">4</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">5</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">6</span>
                </div>
              </div>
              
              <!-- Week 2 -->
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">7</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">8</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">9</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">10</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">11</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">12</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">13</span>
                </div>
              </div>
              
              <!-- Week 3 -->
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-400">14</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg bg-primary/10 border-2 border-primary p-2 cursor-pointer">
                  <span class="text-sm font-bold text-primary">15</span>
                  <div class="w-full h-1 bg-purple-500 rounded mt-1" title="Lomba UI/UX"></div>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">16</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">17</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">18</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">19</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg bg-blue-50 p-2 cursor-pointer">
                  <span class="text-sm font-bold text-primary">20</span>
                  <div class="w-full h-1 bg-primary rounded mt-1" title="Seminar AI"></div>
                </div>
              </div>
              
              <!-- Week 4 -->
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">21</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg bg-green-50 p-2 cursor-pointer">
                  <span class="text-sm font-bold text-green-600">22</span>
                  <div class="w-full h-1 bg-green-500 rounded mt-1" title="Workshop Web"></div>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">23</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">24</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg bg-purple-50 p-2 cursor-pointer">
                  <span class="text-sm font-bold text-purple-600">25</span>
                  <div class="w-full h-1 bg-purple-500 rounded mt-1" title="Lomba Design"></div>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">26</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">27</span>
                </div>
              </div>
              
              <!-- Week 5 -->
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg bg-amber-50 p-2 cursor-pointer">
                  <span class="text-sm font-bold text-amber-600">28</span>
                  <div class="w-full h-1 bg-amber-500 rounded mt-1" title="Talkshow"></div>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">29</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">30</span>
                </div>
              </div>
              <div class="aspect-square p-1">
                <div class="h-full rounded-lg hover:bg-gray-50 p-2 cursor-pointer transition">
                  <span class="text-sm text-gray-600">31</span>
                </div>
              </div>
            </div>
            
            <!-- Legend -->
            <div class="flex flex-wrap gap-4 mt-6 pt-6 border-t">
              <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-primary rounded"></div>
                <span class="text-sm text-gray-600">Seminar</span>
              </div>
              <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-green-500 rounded"></div>
                <span class="text-sm text-gray-600">Workshop</span>
              </div>
              <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-purple-500 rounded"></div>
                <span class="text-sm text-gray-600">Lomba</span>
              </div>
              <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-amber-500 rounded"></div>
                <span class="text-sm text-gray-600">Talkshow</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Upcoming Events Sidebar -->
        <div>
          <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-bold text-dark mb-4">Event Bulan Ini</h3>
            <div class="space-y-4">
              <a href="event-detail.html" class="block p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center text-white font-bold">
                    <div class="text-center">
                      <p class="text-xs">Des</p>
                      <p class="text-lg leading-none">20</p>
                    </div>
                  </div>
                  <div>
                    <p class="font-semibold text-dark">Seminar AI & ML</p>
                    <p class="text-sm text-gray-500">09:00 WIB • Auditorium</p>
                  </div>
                </div>
              </a>
              
              <a href="event-detail.html" class="block p-4 bg-green-50 rounded-xl hover:bg-green-100 transition">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center text-white font-bold">
                    <div class="text-center">
                      <p class="text-xs">Des</p>
                      <p class="text-lg leading-none">22</p>
                    </div>
                  </div>
                  <div>
                    <p class="font-semibold text-dark">Workshop Web Dev</p>
                    <p class="text-sm text-gray-500">13:00 WIB • Lab Komputer</p>
                  </div>
                </div>
              </a>
              
              <a href="event-detail.html" class="block p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center text-white font-bold">
                    <div class="text-center">
                      <p class="text-xs">Des</p>
                      <p class="text-lg leading-none">25</p>
                    </div>
                  </div>
                  <div>
                    <p class="font-semibold text-dark">Lomba UI/UX Design</p>
                    <p class="text-sm text-gray-500">08:00 WIB • Online</p>
                  </div>
                </div>
              </a>
              
              <a href="event-detail.html" class="block p-4 bg-amber-50 rounded-xl hover:bg-amber-100 transition">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 bg-amber-500 rounded-lg flex items-center justify-center text-white font-bold">
                    <div class="text-center">
                      <p class="text-xs">Des</p>
                      <p class="text-lg leading-none">28</p>
                    </div>
                  </div>
                  <div>
                    <p class="font-semibold text-dark">Talkshow Startup</p>
                    <p class="text-sm text-gray-500">10:00 WIB • Aula Utama</p>
                  </div>
                </div>
              </a>
            </div>
            
            <a href="events.html" class="block text-center text-primary font-medium mt-6 hover:underline">
              Lihat Semua Event <i class="fas fa-arrow-right ml-1"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-12 mt-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p class="text-gray-400">&copy; 2025 SIM-Event Kampus. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
