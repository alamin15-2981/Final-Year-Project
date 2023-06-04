<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

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

##########################
# User Page Routes
##########################

#login
Route::get("/user_login",[UserController::class,"loginPage"])->name("user_login");
Route::post("/loginData",[UserController::class,"loginData"])->name("loginData");

#registration
Route::get("/user_register",[UserController::class,"registrationPage"])->name("user_register");
Route::post("/user_register_data",[UserController::class,"registerDataSave"])->name("user_register_data");

Route::view("/user_forgot_password","users.pages.forgot")->name("user_forgot_password");
Route::view("/user_home","users.pages.user_home")->name("user_home");
Route::view("/user_job_show","users.pages.user_job_show")->name("user_job_show");

# users profile 
Route::view("/user_profile","users.pages.user_profile")->name("user_profile");
Route::post("/user_profile_data",[UserController::class,"profileData"])->name("user_profile_data");

Route::view("/user_settings","users.pages.user_settings")->name("user_settings");
Route::view("/user_watch","users.pages.user_watch")->name("user_watch");
Route::get("/user_logout",[UserController::class,"logoutPage"])->name("user_logout");

# Company Page Routes

# login
Route::view("/company_login","company.pages.login")->name("company_login");
Route::post("/loginData",[CompanyController::class,"loginData"])->name("loginData");

# registration
Route::view("/company_register","company.pages.register")->name("company_register");
Route::post("/company_register_data",[CompanyController::class,"registerDataSave"])->name("company_register_data");

Route::view("/company_forgot_password","company.pages.forgot")->name("company_forgot_password");

# company home
Route::view("/company_home","company.pages.company_home")->name("company_home");
Route::post("/company_offers_data",[CompanyController::class,"offersData"])->name("company_offers_data");


Route::view("/company_job_show","company.pages.company_job_show")->name("company_job_show");

# company profile
Route::view("/company_profile","company.pages.company_profile")->name("company_profile");
Route::post("/company_job_post",[CompanyController::class,"jobPost"])->name("company_job_post");

Route::view("/company_settings","company.pages.company_settings")->name("company_settings");

# company watch
Route::get("/company_watch",[CompanyController::class,"watchPage"])->name("company_watch");
Route::post("/company_watch_data",[CompanyController::class,"watchData"])->name("company_watch_data");

Route::get("/company_logout",[UserController::class,"logoutPage"])->name("company_logout");