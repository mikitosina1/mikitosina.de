<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::controller(App\Http\Controllers\AuthLoginRegisterController::class)->group(function() {
    Route::get('/register', 'ShowRegisterForm')->name('register');
    Route::post('/createNewUser', 'createNewUser')->name('createNewUser');
    Route::get('/login', 'ShowLoginForm')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::post('/logout', 'logout')->name('logout');
});