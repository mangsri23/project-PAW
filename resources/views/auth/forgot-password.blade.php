<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - Kemah.in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full grid grid-cols-1 md:grid-cols-2">
        
        <!-- Bagian Kiri -->
        <div class="relative bg-cover bg-center min-h-[300px] md:min-h-[550px] p-8 flex flex-col justify-between text-white" 
             style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7)), url('{{ asset('images/bg-kemahin.jpg') }}');">
            <div>
                <div class="flex items-center gap-2 text-2xl font-bold">
                    <i class="fa-solid fa-mountain-sun"></i>
                    <span>Kemah.in</span>
                </div>
                <p class="text-xs text-gray-200">Rent Your Camping Gear</p>
            </div>

            <div>
                <h2 class="text-3xl font-bold leading-tight mb-2">Explore More,<br>Rent Smarter</h2>
                <p class="text-sm text-gray-200">Sewa perlengkapan camping berkualitas dengan mudah, cepat, dan terpercaya.</p>
            </div>
        </div>

        <!-- Bagian Kanan: Form Reset Password -->
        <div class="p-8 md:p-12 flex flex-col justify-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Lupa Kata Sandi?</h1>
            <p class="text-sm text-gray-500 mb-6">Jawab pertanyaan keamanan untuk mereset kata sandi Anda.</p>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-xs border border-red-300">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
                @csrf
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-regular fa-user"></i></span>
                    <input type="text" name="username" value="{{ old('username') }}" required placeholder="Username"
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Apa nama kota kelahiran Anda? (Sesuai saat mendaftar)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-solid fa-key"></i></span>
                        <input type="text" name="security_answer" required placeholder="Jawaban Keamanan"
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                    </div>
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="newPass" name="password" required placeholder="New Password"
                        class="w-full pl-10 pr-10 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                    <button type="button" onclick="toggleReset('newPass', 'eyeReset1')" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">
                        <i id="eyeReset1" class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="confirmNewPass" name="password_confirmation" required placeholder="Confirm New Password"
                        class="w-full pl-10 pr-10 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                    <button type="button" onclick="toggleReset('confirmNewPass', 'eyeReset2')" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">
                        <i id="eyeReset2" class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>

                <button type="submit" 
                    class="w-full bg-[#1b3c2b] hover:bg-[#132b1f] text-white font-medium py-2.5 rounded-lg transition duration-200 flex items-center justify-center gap-2 shadow-md">
                    <span>Reset Kata Sandi</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-xs text-gray-600 hover:text-emerald-800 font-medium">
                    &larr; Kembali ke Halaman Login
                </a>
            </div>
        </div>
    </div>

    <script>
        function toggleReset(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            input.type = input.type === 'password' ? 'text' : 'password';
            icon.classList.toggle('fa-eye-slash');
            icon.classList.toggle('fa-eye');
        }
    </script>
</body>
</html>