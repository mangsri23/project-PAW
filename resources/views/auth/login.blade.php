<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Akun Anda - Kemah.in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full grid grid-cols-1 md:grid-cols-2">
        
        <!-- Bagian Kiri: Gambar & Branding Kemah.in -->
        <div class="relative bg-cover bg-center min-h-[300px] md:min-h-[550px]" 
            style="background-image: url('{{ asset('images/bg-kemahin.jpg') }}');">
        </div> 

        <!-- Bagian Kanan: Form Login Interaktif -->
        <div class="p-8 md:p-12 flex flex-col justify-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Masuk ke Akun Anda</h1>
            <p class="text-sm text-gray-500 mb-6">Akses dashboard untuk mulai menyewa perlengkapan camping.</p>

            <!-- Alert Sukses / Error -->
            @if (session('success'))
                <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-sm border border-green-300">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-sm border border-red-300">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <input type="text" name="login" value="{{ old('login') }}" required
                            placeholder="Username"
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-800 transition">
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="loginPassword" name="password" required
                            placeholder="Password"
                            class="w-full pl-10 pr-10 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-800 transition">
                        <button type="button" onclick="togglePassword('loginPassword', 'eyeIcon1')" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                            <i id="eyeIcon1" class="fa-regular fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded text-emerald-800 focus:ring-emerald-800">
                        <span>Ingat saya</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-emerald-800 font-medium hover:underline">Lupa password?</a>
                </div>

                <button type="submit" 
                    class="w-full bg-[#1b3c2b] hover:bg-[#132b1f] text-white font-medium py-2.5 rounded-lg transition duration-200 flex items-center justify-center gap-2 shadow-md">
                    <span>Login</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <div class="my-5 flex items-center justify-center">
                <span class="border-t border-gray-200 w-full"></span>
                <span class="px-3 text-xs text-gray-400">atau</span>
                <span class="border-t border-gray-200 w-full"></span>
            </div>

            <p class="text-center text-xs text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}" class="text-emerald-800 font-bold hover:underline">Daftar di sini</a>
            </p>

            <!-- Tautan Pintas ke Login Administrator (Posisi Paling Bawah) -->
            <div class="mt-6 pt-4 border-t border-gray-100 text-center">
                <a href="{{ route('admin.login') }}" class="inline-flex items-center justify-center gap-1.5 text-xs text-gray-400 hover:text-emerald-800 transition">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span>Masuk sebagai Administrator &rarr;</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            }
        }
    </script>
</body>
</html>