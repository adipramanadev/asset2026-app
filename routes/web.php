<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

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
});
