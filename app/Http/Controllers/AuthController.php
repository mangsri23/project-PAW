<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman tampilan
    public function showLogin() 
    { 
        return view('auth.login'); 
    }

    public function showRegister() 
    { 
        return view('auth.register'); 
    }

    public function showForgot() 
    { 
        return view('auth.forgot-password'); 
    }

    // Proses Daftar Akun Baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users',
            'password' => 'required|min:6|confirmed',
            'security_question' => 'required|string',
            'security_answer' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'security_question' => $request->security_question,
            'security_answer' => strtolower(trim($request->security_answer)),
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    // Proses Masuk (Session & Cookie Remember Me)
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mengaktifkan Cookie "Ingat saya" jika dicentang
        $remember = $request->has('remember'); 

        if (Auth::attempt(['username' => $request->login, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah.'])->withInput();
    }

    // Proses Lupa Password menggunakan Pertanyaan Keamanan
    public function resetPassword(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'security_answer' => 'required|string',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || $user->security_answer !== strtolower(trim($request->security_answer))) {
            return back()->withErrors(['username' => 'Username atau jawaban keamanan tidak cocok.']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Kata sandi berhasil diperbarui!');
    }

    // Proses Keluar (Hapus Session)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // ==========================================
    // FITUR LOGIN KHUSUS ADMINISTRATOR
    // ==========================================

    // Menampilkan halaman login Administrator
    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    // Memproses login khusus Administrator
    public function adminLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
            // Cek apakah role akun ini benar-benar 'admin'
            if (Auth::user()->role !== 'admin') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'username' => 'Akses ditolak. Akun ini tidak memiliki hak akses Administrator.',
                ])->withInput();
            }

            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password admin salah.',
        ])->withInput();
    }
}