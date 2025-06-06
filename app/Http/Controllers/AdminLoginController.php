<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Session; 
use App\Http\Requests\AdminLoginRequest;


class AdminLoginController extends Controller
{
    /**
     * Menampilkan form login admin.
     *
     * @return View
     */
    public function showLoginForm()
    {
        return view('auth.login-admin'); 
    }

    /**
     * Menangani proses login admin.
     *
     * @param  Request  
     * @return RedirectResponse
     */
        public function login(AdminLoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        // Clear intended URL to avoid cross-guard redirect issues
        $request->session()->forget('url.intended');
        return redirect()->intended('/admin/dashboard');
    }

    /**
     * 
     *
     * @param Request  
     * @return RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect('/auth/login-admin'); 
    }
}