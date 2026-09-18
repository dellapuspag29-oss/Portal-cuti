<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CutiPublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('cuti.public.create');
});

// Route Pengajuan Cuti (Publik)
Route::get('/pengajuan-cuti', [CutiPublicController::class, 'create'])->name('cuti.public.create');
Route::post('/pengajuan-cuti', [CutiPublicController::class, 'store'])->middleware('throttle:cuti-submit')->name('cuti.public.store');

// Route Cek Status Cuti (Publik)
Route::get('/cek-status-cuti', [CutiPublicController::class, 'cekStatus'])->middleware('throttle:status-check')->name('cuti.public.status');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->middleware('throttle:admin-login')->name('admin.login.store');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth')->name('admin.logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('cuti.admin.')->group(function () {
    Route::get('/cuti', [CutiPublicController::class, 'index'])->name('index');
    Route::get('/cuti/export', [CutiPublicController::class, 'export'])->name('export');
    Route::patch('/cuti/{cuti}/status', [CutiPublicController::class, 'updateStatus'])->middleware('throttle:admin-action')->name('updateStatus');
    Route::get('/cuti/{cuti}/lampiran', [CutiPublicController::class, 'downloadAttachment'])->name('attachment');
});
