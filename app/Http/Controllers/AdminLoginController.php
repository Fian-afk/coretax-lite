<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Session; 

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
    public function login(Request $request)
    {
        $request->validate([
            'company_id' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'company_id' => $request->company_id, 
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) { 
            $request->session()->regenerate(); 

            return redirect()->intended('/admin/dashboard'); 
        }

        return back()->withErrors([
            'company_id' => 'ID Perusahaan atau Password salah.', 
        ])->onlyInput('company_id');
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