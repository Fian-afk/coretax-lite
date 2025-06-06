<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();

        // Cek role user
        if ($user->roles->contains('name', 'admin')) {
            return redirect()->intended('/admin/dashboard');
        } elseif ($user->roles->contains('name', 'user')) {
            return redirect()->intended('/dashboard');
        } else {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Role tidak dikenali.',
            ]);
        }
    }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Tambahkan role default (misal: user)
        $user->roles()->attach(\App\Models\Role::where('name', 'user')->first());

        return redirect('/login')->with('success', 'Akun berhasil dibuat, silakan login.');
    }
}