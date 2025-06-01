<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\ManajemenController;

Route::prefix('manajemen')->group(function () {
    Route::get('/', [ManajemenController::class, 'index'])->name('manajemen.index');
    Route::get('/{id}', [ManajemenController::class, 'show'])->name('manajemen.show');
    Route::post('/{id}/approve', [ManajemenController::class, 'approve'])->name('manajemen.approve');
    Route::post('/{id}/reject', [ManajemenController::class, 'reject'])->name('manajemen.reject');
    Route::delete('/{id}', [ManajemenController::class, 'destroy'])->name('manajemen.destroy');
    Route::post('/bulk-action', [ManajemenController::class, 'bulkAction'])->name('manajemen.bulkAction');
});
=======

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/dokumen', function () {
    return view('document');
});

Route::get('/profil', function () {
    return view('profil');
});
>>>>>>> 68f77847fbb0ee6791645980157172509f5ecb5c
