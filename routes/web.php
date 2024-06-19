<?php

use Illuminate\Support\Facades\Route;

Route::resource('videos', VideoController::class);

Route::middleware('admin')->group(function(){
    Route::get('/admin/videos', [AdminController::class,'videos']);
    Route::post('/admin/videos/{id}/restrict',  [AdminController::class,'restrictVideo']);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
