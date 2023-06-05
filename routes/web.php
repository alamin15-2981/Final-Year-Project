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
Route::get("/company_login",[CompanyController::class,"loginPage"])->name("company_login");
Route::post("/loginData",[CompanyController::class,"loginData"])->name("loginData");

# registration
Route::get("/company_register",[CompanyController::class,"registrationPage"])->name("company_register");
Route::post("/company_register_data",[CompanyController::class,"registerDataSave"])->name("company_register_data");

# forgot password
Route::get("/company_forgot_password",[CompanyController::class,"forgotPage"])->name("company_forgot_password");

# company home
Route::get("/company_home",[CompanyController::class,"homePage"])->name("company_home");
Route::post("/company_offers_data",[CompanyController::class,"offersData"])->name("company_offers_data");
Route::post("/company_offers_update/{id?}",[CompanyController::class,"updateOffers"])->name("company_offers_update");
Route::get("/company_offers_delete/{id?}",[CompanyController::class,"deleteOffers"])->name("company_offers_delete");


# company profile
Route::get("/company_profile",[CompanyController::class,"profilePage"])->name("company_profile");
Route::post("/company_job_post",[CompanyController::class,"jobPost"])->name("company_job_post");
Route::post("/company_job_update/{id?}",[CompanyController::class,"updatePost"])->name("company_job_update");
Route::get("/company_job_delete/{id?}",[CompanyController::class,"deletePost"])->name("company_job_delete");
Route::post("/company_job_feedback",[CompanyController::class,"jobFeedback"])->name("company_job_feedback");
Route::get("/company_job_feedback_delete/{id?}",[CompanyController::class,"deleteJobFeedback"])->name("company_job_feedback_delete");

# company settings
Route::get("/company_settings",[CompanyController::class,"settingsPage"])->name("company_settings");
Route::post("/company_settings_update",[CompanyController::class,"settingsUpdate"])->name("company_settings_update");

# company watch
Route::get("/company_watch",[CompanyController::class,"watchPage"])->name("company_watch");
Route::post("/company_watch_data",[CompanyController::class,"watchData"])->name("company_watch_data");
Route::post("/company_watch_update/{id?}",[CompanyController::class,"updateWatch"])->name("company_watch_update");
Route::get("/company_watch_delete/{id?}",[CompanyController::class,"deleteWatch"])->name("company_watch_delete");
Route::post("/company_watch_feedback",[CompanyController::class,"watchFeedback"])->name("company_watch_feedback");
Route::get("/company_watch_delete_feedback/{id?}",[CompanyController::class,"deleteFeedback"])->name("company_watch_delete_feedback");

Route::get("/company_logout",[CompanyController::class,"logoutPage"])->name("company_logout");