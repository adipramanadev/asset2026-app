<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MutasiAsetController;
use App\Http\Controllers\LaporanController;


Route::view('/', 'welcome')->name('welcome');
Route::view('/features', 'features')->name('features');

Auth::routes();

// Profile routes (accessible after authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes [authentication]
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Category routes - Admin only
    Route::middleware('role:admin')->group(function () {
        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
    });

    // Location routes - Admin only
    Route::middleware('role:admin')->group(function () {
        Route::get('lokasi', [LocationController::class, 'index'])->name('location.index');
        Route::get('lokasi/create', [LocationController::class, 'create'])->name('location.create');
        Route::post('lokasi/store', [LocationController::class, 'store'])->name('location.store');
        Route::get('lokasi/{location}/edit', [LocationController::class, 'edit'])->name('location.edit');
        Route::put('lokasi/{location}/update', [LocationController::class, 'update'])->name('location.update');
        Route::delete('lokasi/{location}/delete', [LocationController::class, 'destroy'])->name('location.destroy');
        Route::get('lokasi/{location}', [LocationController::class, 'show'])->name('location.show');
    });

    // User routes - Admin only
    Route::middleware('role:admin')->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
        Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('user/{user}/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('user/{user}/delete', [UserController::class, 'destroy'])->name('user.destroy');
    });

    // Aset routes - Available for both admin and petugas
    Route::resource('aset', AsetController::class);

    // Mutasi Aset routes - Available for both admin and petugas
    Route::resource('mutasi_aset', MutasiAsetController::class);

    // Laporan routes - Available for both admin and petugas
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.exportExcel');
    Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.exportPdf');
 });



