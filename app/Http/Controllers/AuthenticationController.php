<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('dashboard.sign-in');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil data dari form
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Cek apakah "Remember Me" dicentang

        // Proses login dengan remember
        if (Auth::attempt($credentials, $remember)) {
            // Regenerasi sesi untuk mencegah session fixation
            $request->session()->regenerate();

            // Redirect ke dashboard
            return redirect()->intended('dashboard');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput(); // agar input tetap terisi
    }

    public function logout()
    {
        Auth::logout(); // Keluar dari sesi login
        request()->session()->invalidate(); // Invalidate session
        request()->session()->regenerateToken(); // Regenerate CSRF token
        request()->session()->regenerate();
        return redirect()->route('login'); // Redirect ke halaman login
    }
}
