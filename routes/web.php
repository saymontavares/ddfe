<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Index');
})->name('auth');

Route::post('/auth', function (Request $request) {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    return Redirect::route('auth')->with('message', 'Usuário e/ou senha incorreto');
})->name('auth.login');
