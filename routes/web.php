<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
	return view('index');
})->name('home');

Route::get('/about', function () {
	return view('pages.about');
})->name('about');

Route::get('/test', function () {
	return view('pages.test');
})->name('test');

Route::controller(UserController::class)->group(function() {
	Route::post('/createNewUser', 'createNewUser')->name('createNewUser');
	Route::post('/authenticate', 'authenticate')->name('authenticate');
	Route::get('/dashboard', 'dashboard')->name('dashboard');
	Route::get('/register', 'register')->name('register');
	Route::get('/login', 'login')->name('login');
	Route::post('/updateUser', 'updateUser')->name('updateUser');
	Route::post('/logout', 'logout')->name('logout');
});

Route::controller(PdfController::class)->group(function () {
	Route::post('/exp_pdf', 'generatePdf')->name('generatePdf');
});

Route::get('/lang/{locale}', [LocalizationController::class, 'switch'])->name('lang.switch');

Route::get('/email/verify/{id}/{hash}', fn() => 'verify')->middleware(['auth', 'signed'])->name('verification.verify');
