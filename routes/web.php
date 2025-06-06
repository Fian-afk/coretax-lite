<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Middleware\AdminMiddleware;  
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AuthController;


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
})->name('dashboard');

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('index');
})->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/review', [AdminController::class, 'review'])->name('admin.review');
});
Route::middleware('auth')->group(function () {
    Route::get('/document', function () {
        return view('document');
    })->name('document');
    Route::get('/dokumen', [DocumentController::class, 'document'])->name('dokumen.index'); 
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/upload', [UploadController::class, 'upload'])->name('dokumen.upload');
    Route::post('/upload', [UploadController::class, 'store'])->name('dokumen.upload.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/login-admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/auth/login-admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');
require __DIR__.'/auth.php';

