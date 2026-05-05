<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Add admin role check
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (in_array(Auth::user()->role, ['admin', 'subadmin'])) {
                return redirect()
                    ->route('admin.index')
                    ->with('success', 'Welcome back, Admin!');
            }
        }

        Auth::logout();
        return back()
        ->withInput($request->only('email'))
        ->with([
            'email' => 'The provided credentials do not match our records or you are not an admin.','error'=> 'Invalid login credentials.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
