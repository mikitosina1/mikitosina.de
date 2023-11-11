<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
	return view('index');
})->name('home');

Route::get('/about', function () {
	return view('pages.about');
})->name('about');

Route::get('/test', function () {
	return view('pages.test');
})->name('test');

Route::controller(App\Http\Controllers\UserController::class)->group(function() {
	Route::get('/register', 'ShowRegisterForm')->name('register');
	Route::post('/createNewUser', 'createNewUser')->name('createNewUser');
	Route::get('/login', 'ShowLoginForm')->name('login');
	Route::post('/authenticate', 'authenticate')->name('authenticate');
	Route::get('/dashboard', 'dashboard')->name('dashboard');
	Route::post('/logout', 'logout')->name('logout');
});
