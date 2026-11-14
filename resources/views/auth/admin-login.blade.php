<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk sebagai Administrator - Kemah.in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full grid grid-cols-1 md:grid-cols-2">
        
        <!-- Bagian Kiri: Gambar Admin Utuh dari Figma (Ukuran sama persis dengan Login User) -->
        <div class="relative bg-cover bg-center min-h-[300px] md:min-h-[550px]" 
            style="background-image: url('{{ asset('images/bga-kemahin.jpg') }}');">
        </div> 

        <!-- Bagian Kanan: Form Login Administrator -->
        <div class="p-8 md:p-12 flex flex-col justify-center">
            <div class="flex items-center gap-1.5 text-emerald-800 font-semibold text-xs mb-1.5">
                <i class="fa-solid fa-lock"></i>
                <span>Akses Terbatas</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Masuk sebagai Administrator</h1>
            <p class="text-sm text-gray-500 mb-6">Masukkan kredensial akun admin Anda untuk masuk ke panel.</p>

            <!-- Alert Error -->
            @if ($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-sm border border-red-300">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        <input type="text" name="username" value="{{ old('username') }}" required autofocus
                            placeholder="Username Admin"
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-800 transition">
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="adminPassword" name="password" required
                            placeholder="Password"
                            class="w-full pl-10 pr-10 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-emerald-800 transition">
                        <button type="button" onclick="togglePassword('adminPassword', 'eyeIconAdmin')" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                            <i id="eyeIconAdmin" class="fa-regular fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded text-emerald-800 focus:ring-emerald-800">
                        <span>Ingat sesi saya</span>
                    </label>
                </div>

                <button type="submit" 
                    class="w-full bg-[#1b3c2b] hover:bg-[#132b1f] text-white font-medium py-2.5 rounded-lg transition duration-200 flex items-center justify-center gap-2 shadow-md">
                    <span>Masuk ke Panel Admin</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <!-- Tautan Pintas Kembali ke Login Pengguna -->
            <div class="mt-8 pt-4 border-t border-gray-100 text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-1.5 text-xs text-gray-400 hover:text-emerald-800 transition">
                    <span>&larr;</span>
                    <i class="fa-regular fa-user"></i>
                    <span>Masuk sebagai Pengguna</span>
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