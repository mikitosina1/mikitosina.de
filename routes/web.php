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

Route::get('/login', function () {
	return view('pages.users.login');
})->name('login');

Route::get('/register', function () {
	return view('pages.users.register');
})->name('register');

Route::controller(App\Http\Controllers\UserController::class)->group(function() {
	Route::post('/createNewUser', 'createNewUser')->name('createNewUser');
	Route::post('/authenticate', 'authenticate')->name('authenticate');
	Route::get('/dashboard', 'dashboard')->name('dashboard');
	Route::post('/updateUser', 'updateUser')->name('updateUser');
	Route::post('/logout', 'logout')->name('logout');
});

Route::get('/lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'switch'])->name('lang.switch');
