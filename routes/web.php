<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManajemenController;

Route::prefix('manajemen')->group(function () {
    Route::get('/', [ManajemenController::class, 'index'])->name('manajemen.index');
    Route::get('/{id}', [ManajemenController::class, 'show'])->name('manajemen.show');
    Route::post('/{id}/approve', [ManajemenController::class, 'approve'])->name('manajemen.approve');
    Route::post('/{id}/reject', [ManajemenController::class, 'reject'])->name('manajemen.reject');
    Route::delete('/{id}', [ManajemenController::class, 'destroy'])->name('manajemen.destroy');
    Route::post('/bulk-action', [ManajemenController::class, 'bulkAction'])->name('manajemen.bulkAction');
});
