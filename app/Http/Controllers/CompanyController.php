<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CompanyRegister;
use App\Models\CompanyOffers;
use App\Models\CompanyJobPost;
use App\Models\CompanyWatch;

class CompanyController extends Controller
{
    # company registration page display
    public function registrationPage() {
        return view("users.pages.register");
    }

    # company insert of users registration page
    public function registerDataSave(Request $req) {

        $name = $req->input("name");
        $email = $req->input("email");

        /* check email exist or not in database */
        $count =  DB::table("company_registration")->where("email",$email)->count();
        if($count) {
            session()->flash("failed_msg","Your Email is Already exist. Please try with another email.");
            return redirect("company_register");
        }

        $password = $req->input("password");
        $encrypt_password = password_hash($password,PASSWORD_BCRYPT);

        $profile_photo = $req->file("profile_photo");
        $profile_photo_name = rand()."_".time()."_".$profile_photo->getClientOriginalName();
        $profile_photo->storeAs("public/img/company/register/profile",$profile_photo_name);
        
        $cover_photo = $req->file("cover_photo");
        $cover_photo_name = rand()."_".time()."_".$cover_photo->getClientOriginalName();
        $cover_photo->storeAs("public/img/company/register/cover",$cover_photo_name);

        $gender = $req->input("gender");
        $birth_date = $req->input("birth-date");
        $address = $req->input("address");

        $req->validate([
            "gender" => "required"
        ]);

        $company_register = new CompanyRegister();
        $company_register->name = $name;
        $company_register->email = $email;
        $company_register->password = $encrypt_password;
        $company_register->profile_photo = $profile_photo_name;
        $company_register->cover_photo = $cover_photo_name;
        $company_register->gender = $gender;
        $company_register->birth_date = $birth_date;
        $company_register->address = $address;
        $company_register->save();

        session()->flash("success_msg","Registration Successfully Done.");
        return redirect("company_register");
    }

    # company login page display
    public function loginPage() {
        if(session("gmail")) {
            return redirect("user_home");
        }
        return view("users.pages.login");
    }

    # company login verify
    public function loginData(Request $req) {
        $email = $req->input("email");
        $password = $req->input("password");

        $data =  DB::table("company_registration")->where("email",$email)->first();
        $count = DB::table("company_registration")->where("email",$email)->count();
        if($count == 1 and password_verify($password,$data->password)) {
            session()->put("gmail",$email);
            return redirect("company_home");
        }
        session()->flash("login_failed","Email or password was incorrect.");
        return redirect("company_login");
    }

    # company offersData
    public function offersData(Request $req) {
        $data = DB::table("company_registration")->where("email",session("gmail"))->first();
        $id = $data->id;
        
        $title = $req->input("title");
        $description = $req->input("description");

        $info = new CompanyOffers;
        $info->title = $title;
        $info->description = $description;
        $info->company_id = $id;
        $info->save();

        session()->flash("offers_post_success","Your post submit successfully");
        return redirect("company_home");
    }

    # company jobPost
    public function jobPost(Request $req) {
        $data = DB::table("users_registration")->where("email",session("gmail"))->first();
        $id = $data->id;
        
        $title = $req->input("title");
        $description = $req->input("description");

        $info = new CompanyJobPost;
        $info->title = $title;
        $info->description = $description;
        $info->company_id = $id;
        $info->save();

        session()->flash("job_post_success","Your post submit successfully");
        return redirect("company_profile");
    }

    # company watchPage 
    public function watchPage() {
        $data = DB::table("company_registration")->where("email",session("gmail"))->first();
        $id = $data->id;

        $info = new CompanyWatch;
        $arr = DB::table("company_watch")->select("company_watch.*","company_registration.*")
        ->join("company_registration","company_registration.id","company_watch.company_id")
        ->get()
        ->toArray();

        $newArr = [];
        foreach($arr as $item) {
            $newArr[] = (array) $item;
        }
        
        return view("company.pages.company_watch",compact("newArr"));
    }

    # company watchData
    public function watchData(Request $req) {
        $data = DB::table("company_registration")->where("email",session("gmail"))->first();
        $id = $data->id;
        
        $title = $req->input("title");
        $description = $req->input("description");

        $info = new CompanyWatch;
        $info->url = $title;
        $info->description = $description;
        $info->company_id = $id;
        $info->save();

        session()->flash("watch_post_success","Your post submit successfully");
        return redirect("company_watch");
    }

    # company logout 
    public function logoutPage() {
        if(session("gmail")) {
            session()->pull("gmail",null);
        }
        return redirect("user_login");
    }
}
