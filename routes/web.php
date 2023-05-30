<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

# User Page Routes
Route::view("/user_login","users.pages.login")->name("user_login");
Route::view("/user_forgot_password","users.pages.forgot")->name("user_forgot_password");
Route::view("/user_register","users.pages.register")->name("user_register");