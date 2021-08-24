<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Authentication extends Controller
{
    public function auth(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
            $request->session()->regenerate();
            return redirect()->intended('dash');
        }

        return Redirect::route('auth')->withErrors([
            'auth' => 'Usuário e/ou senha incorreto',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('auth');
    }

    public function index()
    {
        return Inertia::render('Index');
    }
}
