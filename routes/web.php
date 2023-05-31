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
Route::view("/user_register","users.pages.register")->name("user_register");
Route::view("/user_forgot_password","users.pages.forgot")->name("user_forgot_password");
Route::view("/user_home","users.pages.user_home")->name("user_home");
Route::view("/user_job_show","users.pages.user_job_show")->name("user_job_show");
Route::view("/user_profile","users.pages.user_profile")->name("user_profile");