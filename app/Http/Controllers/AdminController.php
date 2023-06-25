<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    # login page display
    public function loginPage(){
        if(session("email"))return redirect("admin_home");
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
            session()->put("email",$adminEmail);
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
        if(!session("email"))return redirect("admin");

        // get users registration data
        $usersRegister = $this->getDatabaseTableInfo("users_registration");

        // get company registration data
        $companyRegister = $this->getDatabaseTableInfo("company_registration");

        return view("admin.pages.home",compact("usersRegister","companyRegister"));
    }


    // deleteInfo
    public function deleteInfo($id,$tableName,$path){
        try {
            DB::table($tableName)->delete($id);
            return redirect($path);
        }catch(Exception $err) {
            session()->flash("error-msg","Cannot delete or update a parent row");
            return redirect($path);
        }
    }


    // get users idea share data
    public function getUsersIdeaData(){
        if(!session("email"))return redirect("admin");
        
        $users_ideaData = DB::table("users_idea")->select("*")->get();
        $users_idea = [];
        foreach($users_ideaData as $item) {
            $users_idea[] = (array) $item;
        }
        return $users_idea;
    }

    # user idea share page display
    public function userIdeaShare(){
        if(!session("email"))return redirect("admin");
        
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
        if(!session("email"))return redirect("admin");
        
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
        if(!session("email"))return redirect("admin");
        
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
        if(!session("email"))return redirect("admin");
        
       // get users registration data
       $usersRegister = $this->getDatabaseTableInfo("users_registration");

       // get company registration data
       $companyRegister = $this->getDatabaseTableInfo("company_registration");

        // get watch data
        $watchData = $this->getDatabaseTableInfo("company_watch");

        return view("admin.pages.company_watch",compact("watchData","usersRegister","companyRegister"));
    } 

    # company resume page display
    public function resumePage(){
        if(!session("email"))return redirect("admin");
        
       // get users registration data
       $usersRegister = $this->getDatabaseTableInfo("users_registration");

       // get company registration data
       $companyRegister = $this->getDatabaseTableInfo("company_registration");

        // get watch data
        $resumeData = $this->getDatabaseTableInfo("users_resume");

        return view("admin.pages.user_resume",compact("resumeData","usersRegister","companyRegister"));
    } 

    # admin logut page
    public function logoutPage(){
        if(session('email')){
            session()->pull('email',null);
        }
        return redirect("admin");
    }
}