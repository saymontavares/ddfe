<?php

use App\Http\Controllers\Authentication;
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

Route::get('/', [Authentication::class, 'index'])->name('auth');
Route::post('/auth', [Authentication::class, 'auth'])->name('auth.login');
Route::get('/logout', [Authentication::class, 'logout'])->name('auth.logout');

Route::get('/dash', function () {
    return Inertia::render('Dashboard');
})->name('dash')->middleware('auth');