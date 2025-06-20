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
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Document;


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

Route::get('/profil', function () {
    return view('profil');
})-> name('profil');

Route::get('/profil/edit', function () {
    return view('/profile/edit');
})-> name('profil.edit');

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    $documents = \App\Models\Document::where('status', 'disetujui')->latest()->take(10)->get();
    // Ambil kategori beserta jumlah dokumen per kategori
    $categories = \App\Models\Document::select('category as nama')
        ->selectRaw('count(*) as documents_count')
        ->groupBy('category')
        ->get()
        ->map(function($cat) {
            // Tambahkan icon dan warna default jika ingin
            $cat->icon = 'ri-folder-line';
            $cat->icon_color = 'text-primary';
            $cat->bg_color = 'bg-blue-50';
            return $cat;
        });
    return view('index-auth', compact('documents', 'categories'));
})->name('dashboard');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('index-admin');
    })->name('admin.dashboard');
    Route::get('admin/review', [AdminController::class, 'review'])->name('admin.review');
    Route::get('admin/dokumen', function() {
        $documents = Document::where('status', 'disetujui')->latest()->get();
        return view('document-admin', compact('documents'));
    })->name('admin.dokumen.index');
    Route::get('admin/dokumen/{id}', [AdminController::class, 'show'])->name('admin.dokumen.show');
    Route::get('admin/manajemen', [ManajemenController::class, 'index'])->name('manajemen');
    Route::post('/manajemen/{id}/approve', [ManajemenController::class, 'approve'])->name('manajemen.approve');
    Route::post('/manajemen/{id}/reject', [ManajemenController::class, 'reject'])->name('manajemen.reject');
    Route::delete('/manajemen/{id}', [ManajemenController::class, 'destroy'])->name('manajemen.destroy');
    Route::post('/manajemen/bulk-action', [ManajemenController::class, 'bulkAction'])->name('manajemen.bulkAction');
});

Route::middleware('auth')->group(function () {//ini untuk middleware user biasa
    // Route::get('/dokumen', [DokumenController::class, 'documentAuth'])->name('document.auth');
    Route::get('/document', [DokumenController::class, 'index'])->name('document');
    Route::get('/dokumen', [DocumentController::class, 'document'])->name('dokumen.index'); 
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/upload', [UploadController::class, 'upload'])->name('dokumen.upload');
    Route::post('/upload', [UploadController::class, 'store'])->name('dokumen.upload.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::get('/auth/login-admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/auth/login-admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');
require __DIR__.'/auth.php';

Route::get('/econodocs', function () {
    return view('index');
})->name('econodocs');
// Route::get('/document', [DokumenController::class, 'index'])->name('document');
Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index'); 
// Route::post('/manajemen/bulk-action', [ManajemenController::class, 'bulkAction'])->name('manajemen.bulkAction');

// Route::delete('/manajemen/{id}', [ManajemenController::class, 'destroy'])->name('manajemen.destroy');

