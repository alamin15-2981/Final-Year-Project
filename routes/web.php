<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;

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

# login
Route::get("/user_login",[UserController::class,"loginPage"])->name("user_login");
Route::post("/user_loginData",[UserController::class,"loginData"])->name("user_loginData");

# registration
Route::get("/user_register",[UserController::class,"registrationPage"])->name("user_register");
Route::post("/user_register_data",[UserController::class,"registerDataSave"])->name("user_register_data");

# change password
Route::get("/user_change_password",[UserController::class,"passwordPage"])->name("user_change_password");
Route::post("/user_change_password_edit",[UserController::class,"changePassword"])->name("user_change_password_edit");

# home page
Route::get("/user_home",[UserController::class,"homePage"])->name("user_home");
Route::get("/user_job_show",[UserController::class,"showJob"])->name("user_job_show");

# users profile 
Route::get("/user_profile",[UserController::class,"profilePage"])->name("user_profile");
Route::post("/user_profile_data",[UserController::class,"profileData"])->name("user_profile_data");
Route::post("/user_profile_data_update/{id?}",[UserController::class,"updatePost"])->name("user_profile_data_update");
Route::get("/user_profile_data_delete/{id?}",[UserController::class,"deletePost"])->name("user_profile_data_delete");

# users settings 
Route::get("/user_settings",[UserController::class,"settingsPage"])->name("user_settings");
Route::post("/user_settings_update",[UserController::class,"settingsUpdate"])->name("user_settings_update");

# user watch
Route::get("/user_watch",[UserController::class,"watchPage"])->name("user_watch");

# user logout
Route::get("/user_logout",[UserController::class,"logoutPage"])->name("user_logout");








##########################
# Company Page Routes
##########################

# login
Route::get("/company_login",[CompanyController::class,"loginPage"])->name("company_login");
Route::post("/loginData",[CompanyController::class,"loginData"])->name("loginData");

# registration
Route::get("/company_register",[CompanyController::class,"registrationPage"])->name("company_register");
Route::post("/company_register_data",[CompanyController::class,"registerDataSave"])->name("company_register_data");

# forgot password
Route::get("/company_change_password",[CompanyController::class,"passwordPage"])->name("company_change_password");
Route::post("/company_change_password_edit",[CompanyController::class,"changePassword"])->name("company_change_password_edit");

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

# company logout
Route::get("/company_logout",[CompanyController::class,"logoutPage"])->name("company_logout");




##########################
# Admin Page Routes
##########################

# login page
Route::get("/admin",[AdminController::class,"loginPage"])->name("admin");
Route::post("/admin_loginData",[AdminController::class,"loginValidation"])->name("admin_loginData");

# User's information
# home page
Route::get("/admin_home",[AdminController::class,"homePage"])->name("admin_home");

# share idea from user
Route::get("/admin_user_share_idea",[AdminController::class,"userIdeaShare"])->name("admin_user_share_idea");


# Company's information
# job post page
Route::get("/admin_job_post",[AdminController::class,"showPostJob"])->name("admin_job_post");

# offers page
Route::get("/admin_offers",[AdminController::class,"companyOffers"])->name("admin_offers");

# watch page
Route::get("/admin_watch",[AdminController::class,"watchPage"])->name("admin_watch");