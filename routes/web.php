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
Route::view("/user_settings","users.pages.user_settings")->name("user_settings");
Route::view("/user_watch","users.pages.user_watch")->name("user_watch");

# Company Page Routes
Route::view("/company_login","company.pages.login")->name("company_login");
Route::view("/company_register","company.pages.register")->name("company_register");
Route::view("/company_forgot_password","company.pages.forgot")->name("user_forgot_password");
Route::view("/company_home","company.pages.company_home")->name("company_home");
Route::view("/company_job_show","company.pages.company_job_show")->name("company_job_show");
Route::view("/company_profile","company.pages.company_profile")->name("company_profile");
Route::view("/company_settings","company.pages.company_settings")->name("company_settings");
Route::view("/company_watch","company.pages.company_watch")->name("company_watch");