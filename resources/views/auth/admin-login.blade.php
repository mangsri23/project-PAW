<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk sebagai Administrator - Kemah.in</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full grid grid-cols-1 md:grid-cols-2">
        
        <!-- Sisi Kiri: Branding Admin -->
        <div class="relative bg-emerald-950 text-white p-8 md:p-10 flex flex-col justify-between min-h-[340px]">
            <img src="{{ asset('images/bg-kemahin.jpg') }}" alt="Kemah.in Admin" class="absolute inset-0 w-full h-full object-cover opacity-25">
            <div class="relative z-10">
                <span class="inline-block bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 text-[10px] font-bold px-3 py-1 rounded-full tracking-wider uppercase">
                    SISTEM INTERNAL
                </span>
                <div class="flex items-center gap-2 mt-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 20h18L14 6l-4 8-3-4-4 10z"/>
                    </svg>
                    <div>
                        <h1 class="text-xl font-bold leading-none">Kemah.in</h1>
                        <p class="text-[11px] text-emerald-200 mt-0.5">Panel Kontrol Admin</p>
                    </div>
                </div>
            </div>

            <div class="relative z-10 mt-10">
                <h2 class="text-2xl font-bold leading-snug">Kelola Operasional & Inventaris Camping.</h2>
                <p class="text-xs text-gray-300 mt-2 leading-relaxed">
                    Portal khusus administrator untuk mengelola stok perlengkapan, pesanan penyewaan, dan verifikasi pelanggan.
                </p>
            </div>
        </div>

        <!-- Sisi Kanan: Form Login Admin -->
        <div class="p-8 md:p-10 flex flex-col justify-center">
            <div class="mb-6">
                <div class="flex items-center gap-1.5 text-emerald-800 font-semibold text-xs mb-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <span>Akses Terbatas</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Masuk sebagai Administrator</h2>
                <p class="text-xs text-gray-500 mt-1">Masukkan kredensial akun admin Anda untuk masuk ke panel.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-200 text-red-600 text-xs">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </span>
                        <input type="text" name="username" value="{{ old('username') }}" required autofocus
                            placeholder="Username Admin"
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:border-transparent">
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </span>
                        <input type="password" id="adminPassword" name="password" required
                            placeholder="Password"
                            class="w-full pl-10 pr-10 py-2.5 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700 focus:border-transparent">
                        <button type="button" onclick="toggleAdminPassword()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 text-xs text-gray-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-emerald-800 focus:ring-emerald-700">
                        <span>Ingat sesi saya</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-emerald-900 hover:bg-emerald-800 text-white font-semibold py-2.5 rounded-lg text-sm transition duration-200 shadow-sm">
                    Masuk ke Panel Admin &rarr;
                </button>
            </form>

            <!-- Tautan Pintas Kembali ke Login Pengguna -->
            <div class="mt-6 pt-4 border-t border-gray-100 text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-1.5 text-xs text-gray-400 hover:text-emerald-700 transition">
                    <span>&larr;</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Masuk sebagai Pengguna</span>
                </a>
            </div>
        </div>

    </div>

    <script>
        function toggleAdminPassword() {
            const input = document.getElementById('adminPassword');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>

</body>
</html>