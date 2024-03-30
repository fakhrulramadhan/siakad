<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.auth-login', ['type_menu' => '']);
});

//perlu bikin middleware ketika sukses login
Route::middleware(['auth'])->group(function () {

    Route::get('home', function () {
        return view('pages.app.dashboard-siakad', ['type_menu' => '']);
    })->name('home');
}); //jadi akses urlnya localhost/home namenyua salah tempat


//ininya harus ditutup agar ketika user sudah login, enggak bisa balik lagi ke halaman
//login
// Route::get('/login', function () {
//     return view('pages.auth.auth-login');
// })->name('login');

// Route::get('/register', function () {
//     return view('pages.auth.auth-register');
// })->name('register'); //penamaan route pakai name

// Route::get('/forgot', function () {
//     return view('pages.auth.auth-forgot-password');
// })->name('forgot');

// Route::get('/reset-password', function () {
//     return view('pages.auth.auth-reset-password');
// })->name('reset-password');

