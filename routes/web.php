<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresensiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

// ROUTE PRESENSI (SATU SAJA, JANGAN DOBEL)
Route::middleware(['auth'])->group(function () {
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi');
    Route::get('/scan', [PresensiController::class, 'scan'])->name('scan');
    Route::post('/presensi/store', [PresensiController::class, 'store'])
        ->name('presensi.store');
});
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/create-admin', function () {
    User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('12345678'),
    ]);
    return 'Admin berhasil dibuat';
});
