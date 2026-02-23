<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/addRoom', [AdminController::class, 'addRoom'])->name('admin.addRoom');
        Route::post('/add_room',[AdminController::class,'add_room'])->name('admin.add_room');
        Route::get('/view_rooms',[AdminController::class,'view_rooms'])->name('admin.view_rooms');
    });

Route::middleware(['auth', 'role:user'])
    ->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    });


    Route::get('/', [UserController::class, 'home'])->name('home');
    Route::get('/about', [UserController::class, 'about'])->name('about');
    Route::get('/room', [UserController::class, 'room'])->name('room');
    Route::get('/gallery', [UserController::class, 'gallery'])->name('gallery');
    Route::get('/blog', [UserController::class, 'blog'])->name('blog');
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');


Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__ . '/auth.php';
