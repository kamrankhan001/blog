<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Auth\AuthController;


// Auth
Route::get('admin/login', [AuthController::class, 'index'])->name('login');
Route::post('admin/login', [AuthController::class, 'login']);
Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::get('showblogs', [BlogController::class, 'index'])->name('blogs')->middleware('auth');
Route::get('postnewblog', [BlogController::class, 'create'])->name('create')->middleware('auth');
Route::post('postnewblog', [BlogController::class, 'store']);
Route::get('editblog/{id}', [BlogController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('editblog/{id}', [BlogController::class, 'update']);
Route::get('destroy/{id}', [BlogController::class, 'destroy'])->name('destroy')->middleware('auth');

// Users
Route::get('/', [BlogController::class, 'show_all_blog'])->name('home');
Route::get('post/{id}', [BlogController::class, 'show_blog'])->name('post');

// Categories
Route::get('visualdesigns', [BlogController::class, 'visual_designs'])->name('visualdesigns');
Route::get('videoandaudio', [BlogController::class, 'video_and_audio'])->name('videoandaudio');
Route::get('webdevelopment', [BlogController::class, 'web_development'])->name('webdevelopment');
Route::get('travelevents', [BlogController::class, 'travel_events'])->name('travelevents');

// Contact
Route::post('contactus', [BlogController::class, 'contact_us'])->name('contactus');