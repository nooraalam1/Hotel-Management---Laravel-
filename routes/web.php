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
        Route::post('/add_room', [AdminController::class, 'add_room'])->name('admin.add_room');
        Route::get('/view_rooms', [AdminController::class, 'view_rooms'])->name('admin.view_rooms');
        Route::delete('/delete_room/{room}', [AdminController::class, 'delete'])->name('admin.delete_room');
        Route::get('/edit/{room}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/update/{room}', [AdminController::class, 'update_room'])->name('admin.update_room');
        Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
        Route::put('/booking/approve/{id}', [AdminController::class, 'booking_approve'])->name('admin.booking_approve');
        Route::put('/booking/reject/{id}', [AdminController::class, 'booking_reject'])->name('admin.booking_reject');

        //banner route
        Route::get('/banner', [AdminController::class, 'banner'])->name('admin.banner');
        //gallery route
        Route::get('/gallery', [AdminController::class, 'gallery'])->name('admin.gallery');

        //locations
        Route::get('/addlocation',[AdminController::class,'addlocation'])->name('admin.addlocation');
        Route::get('/viewlocations',[AdminController::class,'viewlocations'])->name('admin.viewlocations');
        Route::post('/location/add',[AdminController::class,'createlocation'])->name('admin.createlocation');
        Route::delete('/location/{id}',[AdminController::class,'deletelocation'])->name('admin.deletelocation');
        Route::get('/location/edit/{id}',[AdminController::class,'editlocation'])->name('admin.editlocation');
        Route::put('/location/update/{id}',[AdminController::class,'updatelocation'])->name('admin.updatelocation');


        //blog
        Route::get('/addblog',[AdminController::class,'addblog'])->name('admin.addblog');
        Route::get('/viewblog',[AdminController::class,'viewblog'])->name('admin.viewblog');
        Route::post('/blog/addblog',[AdminController::class,'addABlog'])->name('admin.addablog');
        Route::get('/blog/edit/{blog}',[AdminController::class,'editBlog'])->name('admin.editBlog');
        Route::put('/blog/update/{blog}',[AdminController::class,'updateBlog'])->name('admin.updateBlog');
        Route::delete('/blog/delete/{blog}',[AdminController::class,'deleteBlog'])->name('admin.deleteBlog');

        //facility
        Route::get('/facility/add',[AdminController::class,'addfacility'])->name('admin.addfacility');
        Route::get('/facility/view',[AdminController::class,'viewfacility'])->name('admin.viewfacility');
        Route::post('/facility/create',[AdminController::class,'createFacility'])->name('admin.createFacility');
        Route::delete('/facility/delete/{id}',[AdminController::class,'deleteFacility'])->name('admin.deleteFacility');
    });

Route::middleware(['auth', 'role:user'])
    ->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    });
Route::middleware(['auth', 'role:user,admin'])
    ->group(function () {
        Route::post('/booking/{room}', [AdminController::class, 'booking'])->name('room_book');
    });
        Route::get('/', [UserController::class, 'home'])->name('home');
        Route::get('/about', [UserController::class, 'about'])->name('about');
        Route::get('/room', [UserController::class, 'room'])->name('room');
        Route::get('/gallery', [UserController::class, 'gallery'])->name('gallery');
        Route::get('/locations', [UserController::class, 'locations'])->name('locations');
        Route::get('/blog', [UserController::class, 'blog'])->name('blog');
        Route::get('/contact', [UserController::class, 'contact'])->name('contact');
        Route::get('/room_details/{room}', [UserController::class, 'room_details'])->name('room_details');

        //view hotels in one specific division
        Route::get('/locations/division/viewall/{id}',[UserController::class,'hotelsInDivision'])->name('hotelsInDivision');

Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__ . '/auth.php';
