<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun Baru - Kemah.in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full grid grid-cols-1 md:grid-cols-2">
        
        <!-- Bagian Kiri -->
        <div class="relative bg-cover bg-center min-h-[300px] md:min-h-[550px]" 
            style="background-image: url('{{ asset('images/bg-kemahin.jpg') }}');">
        </div> 

        <!-- Bagian Kanan: Form Register -->
        <div class="p-8 md:p-10 flex flex-col justify-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Buat Akun Baru</h1>
            <p class="text-sm text-gray-500 mb-5">Daftar untuk mulai menyewa alat camping.</p>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-xs border border-red-300">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST" class="space-y-3" id="registerForm">
                @csrf
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-regular fa-id-card"></i></span>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Full Name"
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-regular fa-user"></i></span>
                    <input type="text" name="username" value="{{ old('username') }}" required placeholder="Username"
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="regPass" name="password" required placeholder="Password"
                        class="w-full pl-10 pr-10 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                    <button type="button" onclick="togglePass('regPass', 'eyeReg1')" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">
                        <i id="eyeReg1" class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="regPassConfirm" name="password_confirmation" required placeholder="Confirm Password"
                        class="w-full pl-10 pr-10 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                    <button type="button" onclick="togglePass('regPassConfirm', 'eyeReg2')" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">
                        <i id="eyeReg2" class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>
                <p id="passMatchMsg" class="text-xs hidden"></p>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-regular fa-circle-question"></i></span>
                    <select name="security_question" required
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm text-gray-600 focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                        <option value="" disabled selected>Pilih Pertanyaan Keamanan</option>
                        <option value="Apa nama kota kelahiran Anda?">Apa nama kota kelahiran Anda?</option>
                        <option value="Siapa nama hewan peliharaan pertama Anda?">Siapa nama hewan peliharaan pertama Anda?</option>
                        <option value="Apa nama gunung pertama yang Anda daki?">Apa nama gunung pertama yang Anda daki?</option>
                    </select>
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fa-solid fa-key"></i></span>
                    <input type="text" name="security_answer" required placeholder="Jawaban Keamanan"
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-800 focus:outline-none">
                </div>

                <button type="submit" 
                    class="w-full bg-[#1b3c2b] hover:bg-[#132b1f] text-white font-medium py-2.5 rounded-lg transition duration-200 flex items-center justify-center gap-2 shadow-md mt-2">
                    <span>Daftar Sekarang</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <p class="text-center text-xs text-gray-600 mt-5">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-emerald-800 font-bold hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>

    <script>
        function togglePass(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            input.type = input.type === 'password' ? 'text' : 'password';
            icon.classList.toggle('fa-eye-slash');
            icon.classList.toggle('fa-eye');
        }

        // Cek kecocokan password secara real-time
        const pass = document.getElementById('regPass');
        const confirmPass = document.getElementById('regPassConfirm');
        const msg = document.getElementById('passMatchMsg');

        confirmPass.addEventListener('input', () => {
            msg.classList.remove('hidden');
            if (confirmPass.value === pass.value) {
                msg.textContent = '✓ Password cocok';
                msg.className = 'text-xs text-green-600';
            } else {
                msg.textContent = '✗ Password belum cocok';
                msg.className = 'text-xs text-red-500';
            }
        });
    </script>
</body>
</html>