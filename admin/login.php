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

      <!-- Login Form -->
      <form class="space-y-5">
        <div>
          <label class="block text-sm font-medium text-slate-300 mb-2">Username Admin</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
              <i class="fas fa-user-shield"></i>
            </span>
            <input type="text" placeholder="admin" class="w-full pl-12 pr-4 py-3 bg-slate-700 border border-slate-600 text-white rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition placeholder-slate-500">
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-slate-300 mb-2">Password</label>
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" placeholder="••••••••" class="w-full pl-12 pr-12 py-3 bg-slate-700 border border-slate-600 text-white rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition placeholder-slate-500">
            <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" class="w-4 h-4 text-primary bg-slate-700 border-slate-600 rounded focus:ring-primary focus:ring-offset-slate-800">
            <span class="text-sm text-slate-400">Ingat saya</span>
          </label>
          <a href="#" class="text-sm text-primary hover:text-blue-400 font-medium">Lupa password?</a>
        </div>
        
        <a href="dashboard-admin.html" class="w-full py-3 bg-primary text-white rounded-xl font-semibold hover:bg-secondary transition flex items-center justify-center gap-2">
          <i class="fas fa-right-to-bracket"></i> Masuk ke Dashboard
        </a>
      </form>

      <!-- Divider -->
      <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-slate-700"></div>
        </div>
        <div class="relative flex justify-center text-sm">
          <span class="px-4 bg-slate-800 text-slate-500">atau</span>
        </div>
      </div>

      <!-- SSO Admin -->
      <button type="button" class="w-full py-3 border border-slate-600 text-slate-300 rounded-xl font-medium hover:bg-slate-700 transition flex items-center justify-center gap-2">
        <i class="fas fa-key text-primary"></i> Masuk dengan SSO Admin
      </button>
    </div>

    <!-- Footer Links -->
    <div class="mt-6 text-center">
      <a href="login.html" class="text-slate-400 hover:text-white text-sm flex items-center justify-center gap-2">
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
</body>
</html>
