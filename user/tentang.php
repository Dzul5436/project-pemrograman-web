<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang - SIM-Event Kampus</title>
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
        <a href="calendar.html" class="text-gray-600 hover:text-primary transition">Kalender</a>
        <a href="about.html" class="text-primary font-semibold">Tentang</a>
        </div>
        
        <div class="flex items-center space-x-3">
        <a href="login.html" class="px-4 py-2 text-primary border-2 border-primary rounded-lg hover:bg-primary hover:text-white transition font-medium">Masuk</a>
        </div>
    </div>
    </div>
</nav>

<!--Header-->
  <section class="bg-gradient-to-r from-primary to-secondary py-8">
    <div class="max-w-7xl mx-auto px-4">
      <h1 class="text-3xl font-bold text-white">Tentang SIM-Event Kampus</h1>
      <p class="text-blue-100 mt-2">Cara menggunakan SIM-Event Kampus</p>
    </div>
  </section>

<!-- About Section -->
  <section class="relative py-16 pb-20 overflow-hidden">
    <div class="blob w-96 h-96 bg-accent/20 rounded-full absolute top-0 -left-16 filter blur-3xl animate-blob animation-delay-2000"></div>
    <div class="blob w-96 h-96 bg-primary/20 rounded-full absolute bottom-0 -right-16 filter blur-3xl animate-blob animation-delay-4000"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full text-primary text-sm font-semibold mb-6">
                    <i class="fas fa-info-circle"></i>
                    Tentang Kami
                </span>
                <h1 class="text-3xl lg:text-4x1 font-bold leading-light mb-6">
                    Apa <span class="text-primary">SIM-Event Kampus</span> Itu?
                </h1>
                <p class="text-xl text-muted leading-relaxed">
                    SIM-Event Kampus adalah platform manajemen event yang dirancang khusus untuk memudahkan mahasiswa dan penyelenggara dalam mengelola, mendaftar, dan mengikuti berbagai acara kampus.
                </p>
            </div>
    </div>
  </section>

  <!--Main Steps Section-->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Cara Menggunakan SIM-Event Kampus</h2>
            <p class="text-gray-600">Ikuti langkah-langkah mudah berikut untuk mulai menggunakan platform kami.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-user-plus text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">1. Daftar Akun</h3>
            <p class="text-gray-600">Buat akun baru dengan mengisi formulir pendaftaran sederhana.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-calendar-alt text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">2. Jelajahi Event</h3>
            <p class="text-gray-600">Telusuri berbagai event menarik yang tersedia di kampusmu.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-ticket-alt text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">3. Daftar dan Ikuti</h3>
            <p class="text-gray-600">Daftar untuk event yang kamu minati dan ikuti acara tersebut dengan mudah.</p>
            </div>
        </div>
        </div>