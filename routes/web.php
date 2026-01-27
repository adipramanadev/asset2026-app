<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//prefit route  [authentication]

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //halaman profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    //halaman category
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
    // category show
    Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
    
    //lokasi 
    Route::get('lokasi', [LocationController::class, 'index'])->name('location.index');
    Route::get('lokasi/create', [LocationController::class, 'create'])->name('location.create');
    Route::post('lokasi/store', [LocationController::class, 'store'])->name('location.store');
    Route::get('lokasi/{location}/edit', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('lokasi/{location}/update', [LocationController::class, 'update'])->name('location.update');
    Route::delete('lokasi/{location}/delete', [LocationController::class, 'destroy'])->name('location.destroy');
    Route::get('lokasi/{location}', [LocationController::class, 'show'])->name('location.show');
});
