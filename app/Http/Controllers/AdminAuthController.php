<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('admin.login', ['title' => 'Login Admin']);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'Email atau password salah.'])
                ->onlyInput('email');
        }

        if (! Auth::user()?->is_admin) {
            Auth::logout();

            return back()
                ->withErrors(['email' => 'Akun ini bukan admin.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('blog.index')->with('success', 'Berhasil login sebagai admin.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('events.index')->with('success', 'Anda telah logout dari admin.');
    }
}
