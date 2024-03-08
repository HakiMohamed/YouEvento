<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(ReservationController::class)->group(function () {
Route::put('/reservations/{reservation}','cancel')->name('reservations.cancel');
Route::POST('/reservations/{reservation}','reReserver')->name('reservations.reReserver');
Route::get('/events/{event}/reservations/create','create')->name('reservations.create');
Route::post('/events/{id}/reservations','store')->name('reservations.store');
Route::get('/reservations/{reservation}','show')->name('reservations.show');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user/reservations','showUserReservations')->name('user.reservations');
    Route::get('/profile/{user}', 'showuser')->name('profiles.profile');
    Route::get('/profile/edit', 'edituser')->name('profiles.edit');
    Route::put('/profile/{user}', 'updateuser')->name('profiles.update');
    Route::get('/user/{user}/posts', 'showUserPosts')->name('profiles.Myposts');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register',  'showRegister')->name('register');
    Route::post('/register',  'register');
    Route::get('/login',  'showLogin')->name('login');
    Route::post('/login',  'login');
    Route::post('/logout',  'logout')->middleware('auth')->name('logout');
});

Route::get('/events/search', [EventController::class, 'search'])->name('events.search');

Route::controller(EventController::class)->group(function () {
Route::get('/','index')->name('events.index');
Route::get('/user/{user}/events','showUserEvents')->name('events.user');
Route::get('/events','index')->name('events.index');
Route::get('/events/create','create')->name('events.create');
Route::post('/events','store')->name('events.store');
Route::get('/events/{id}','show')->name('events.show');
Route::get('/events/{id}/edit','edit')->name('events.edit');
Route::put('/events/{id}','update')->name('events.update');
Route::delete('/events/{id}','destroy')->name('events.destroy');
Route::get('/events/search', 'search')->name('events.search');

});