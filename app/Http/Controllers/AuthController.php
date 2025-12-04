<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.home');
        }
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        \Log::debug('Raw request data', [
            'all' => $request->all(),
            'email_raw' => $request->input('email'),
            'password_raw' => $request->input('password'),
        ]);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        \Log::debug('After validation', [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'password_length' => strlen($credentials['password']),
        ]);

        // Test if user exists
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if ($user) {
            \Log::debug('User found', ['email' => $user->email, 'id' => $user->id]);
        } else {
            \Log::warning('User not found', ['email' => $credentials['email']]);
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.home')->with('success', 'Login berhasil! Selamat datang di admin panel.');
        }

        \Log::warning('Login failed - Auth::attempt returned false', [
            'email' => $credentials['email'],
            'password_length' => strlen($credentials['password']),
        ]);

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Email atau password yang Anda masukkan salah.',
            ]);
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah logout berhasil.');
    }
}
