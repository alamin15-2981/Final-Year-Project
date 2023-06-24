<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    # login page display
    public function loginPage(){
       return view("admin.login");
    }

    # login page validation 
    public function loginValidation(Request $req){
        # default admin email and password
        $adminEmail = "admin@gmail.com";
        $adminPwd = "admin"; 

        # get admin email and password from login form
        $email = $req->input("email");
        $password = $req->input("password");

        if($adminEmail == $email and $adminPwd == $password) {
            return redirect("admin_home");
        }else{
            session()->flash("login_failed","Email or password is invalid!");
            return redirect("admin");
        }
    }

    // get database table info
    public function getDatabaseTableInfo($table_name){
        $info = DB::table($table_name)->select("*")->get();
        $data = [];
        foreach($info as $item) {
            $data[] = (array) $item;
        }
        return $data;
    }

    # home page display 
    public function homePage(){
        // get users registration data
        $usersRegister = $this->getDatabaseTableInfo("users_registration");

        // get company registration data
        $companyRegister = $this->getDatabaseTableInfo("company_registration");

        return view("admin.pages.home",compact("usersRegister","companyRegister"));
    }

    // get users idea share data
    public function getUsersIdeaData(){
        $users_ideaData = DB::table("users_idea")->select("*")->get();
        $users_idea = [];
        foreach($users_ideaData as $item) {
            $users_idea[] = (array) $item;
        }
        return $users_idea;
    }

    # user idea share page display
    public function userIdeaShare(){
        // get users registration data
        $usersRegister = $this->getDatabaseTableInfo("users_registration");

        // get company registration data
        $companyRegister = $this->getDatabaseTableInfo("company_registration");

        // get users idea data
        $users_idea = $this->getDatabaseTableInfo("users_idea");

        return view("admin.pages.user_idea_share",compact("users_idea","usersRegister","companyRegister"));
    }

    # Company's information
    # job post display
    public function showPostJob(){
       // get users registration data
       $usersRegister = $this->getDatabaseTableInfo("users_registration");

       // get company registration data
       $companyRegister = $this->getDatabaseTableInfo("company_registration");

        // get job post data
        $companyJobPost = $this->getDatabaseTableInfo("company_job_post");

        return view("admin.pages.company_job_post",compact("companyJobPost","usersRegister","companyRegister"));
    }

    # company offers display
    public function companyOffers(){
       // get users registration data
       $usersRegister = $this->getDatabaseTableInfo("users_registration");

       // get company registration data
       $companyRegister = $this->getDatabaseTableInfo("company_registration");

        // get job post data
        $companyOffers = $this->getDatabaseTableInfo("company_offers");

        return view("admin.pages.company_offers",compact("companyOffers","usersRegister","companyRegister"));
    } 

    # company watch page display
    public function watchPage(){
       // get users registration data
       $usersRegister = $this->getDatabaseTableInfo("users_registration");

       // get company registration data
       $companyRegister = $this->getDatabaseTableInfo("company_registration");

        // get watch data
        $watchData = $this->getDatabaseTableInfo("company_watch");

        return view("admin.pages.company_watch",compact("watchData","usersRegister","companyRegister"));
    } 
}