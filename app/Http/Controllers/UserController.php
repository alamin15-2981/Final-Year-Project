<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\UsersRegister;
use App\Models\UsersIdea;


class UserController extends Controller
{
    
    # users registration page display
    public function registrationPage() {
        return view("users.pages.register");
    }

    # data insert of users registration page
    public function registerDataSave(Request $req) {

        $name = $req->input("name");
        $email = $req->input("email");

        /* check email exist or not in database */
        $count =  DB::table("users_registration")->where("email",$email)->count();
        if($count) {
            session()->flash("failed_msg","Your Email is Already exist. Please try with another email.");
            return redirect("user_register");
        }

        $password = $req->input("password");
        $encrypt_password = password_hash($password,PASSWORD_BCRYPT);

        $profile_photo = $req->file("profile_photo");
        $profile_photo_name = rand()."_".time()."_".$profile_photo->getClientOriginalName();
        $profile_photo->storeAs("public/img/users/register/profile",$profile_photo_name);
        
        $cover_photo = $req->file("cover_photo");
        $cover_photo_name = rand()."_".time()."_".$cover_photo->getClientOriginalName();
        $cover_photo->storeAs("public/img/users/register/cover",$cover_photo_name);

        $gender = $req->input("gender");
        $birth_date = $req->input("birth-date");
        $address = $req->input("address");

        $req->validate([
            "gender" => "required"
        ]);

        $user_register = new UsersRegister;
        $user_register->name = $name;
        $user_register->email = $email;
        $user_register->password = $encrypt_password;
        $user_register->profile_photo = $profile_photo_name;
        $user_register->cover_photo = $cover_photo_name;
        $user_register->gender = $gender;
        $user_register->birth_date = $birth_date;
        $user_register->address = $address;
        $user_register->save();

        session()->flash("success_msg","Registration Successfully Done.");
        return redirect("user_register");
    }

    # users login page display
    public function loginPage() {
        if(session("gmail")) {
            return redirect("user_home");
        }
        return view("users.pages.login");
    }

    # users login verify
    public function loginData(Request $req) {
        $email = $req->input("email");
        $password = $req->input("password");

        $data =  DB::table("users_registration")->where("email",$email)->first();
        $count = DB::table("users_registration")->where("email",$email)->count();
        if($count == 1 and password_verify($password,$data->password)) {
            session()->put("gmail",$email);
            return redirect("user_home");
        }
        session()->flash("login_failed","Email or password was incorrect.");
        return redirect("user_login");
    }

    # users profileData
    public function profileData(Request $req) {
        $data = DB::table("users_registration")->where("email",session("gmail"))->first();
        $id = $data->id;
        
        $title = $req->input("title");
        $description = $req->input("description");

        $idea = new UsersIdea;
        $idea->title = $title;
        $idea->description = $description;
        $idea->users_id = $id;
        $idea->save();

        session()->flash("idea_post_success","Your post submit successfully");
        return redirect("user_profile");
    }

    # users logout 
    public function logoutPage() {
        if(session("gmail")) {
            session()->pull("gmail",null);
        }
        return redirect("user_login");
    }

}