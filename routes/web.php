<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/tours', [TourController::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

//subscription post
Route::get('/subscribe', [SubscriptionController::class, 'showForm'])->name('subscription.form');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscription.submit');


//delete user
Route::get('/user/delete', [UserController::class, 'showDeleteForm'])->name('user.delete.form');
Route::post('/user/delete', [UserController::class, 'deleteUser'])->name('user.delete.submit');