<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Models\UsersRegister;
use App\Models\UsersIdea;
use App\Models\CompanyWatch;
use App\Models\CompanyWatchFeedback;


class UserController extends Controller
{

    # users registration page display
    public function registrationPage()
    {
        if (session("gmail"))
            return redirect("user_home");
        else
            return view("users.pages.register");
    }

    # data insert of users registration page
    public function registerDataSave(Request $req)
    {

        $name = $req->input("name");
        $email = $req->input("email");

        /* check email exist or not in database */
        $count =  DB::table("users_registration")->where("email", $email)->count();
        if ($count) {
            session()->flash("failed_msg", "Your Email is Already exist. Please try with another email.");
            return redirect("user_register");
        }

        $password = $req->input("password");
        $encrypt_password = password_hash($password, PASSWORD_BCRYPT);

        $profile_photo = $req->file("profile_photo");
        $profile_photo_name = rand() . "_" . time() . "_" . $profile_photo->getClientOriginalName();
        $profile_photo->storeAs("public/img/users/register/profile", $profile_photo_name);

        $cover_photo = $req->file("cover_photo");
        $cover_photo_name = rand() . "_" . time() . "_" . $cover_photo->getClientOriginalName();
        $cover_photo->storeAs("public/img/users/register/cover", $cover_photo_name);

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

        session()->flash("success_msg", "Registration Successfully Done.");
        return redirect("user_register");
    }

    # users login page display
    public function loginPage()
    {
        if (session("gmail")) {
            return redirect("user_home");
        }
        return view("users.pages.login");
    }

    # users login verify
    public function loginData(Request $req)
    {
        $email = $req->input("email");
        $password = $req->input("password");

        $data =  DB::table("users_registration")->where("email", $email)->first();
        $count = DB::table("users_registration")->where("email", $email)->count();
        if ($count == 1 and password_verify($password, $data->password)) {
            session()->put("gmail", $email);
            return redirect("user_home");
        }
        session()->flash("login_failed", "Email or password was incorrect.");
        return redirect("user_login");
    }

    # user passwordPage 
    public function passwordPage()
    {
        if (session('gmail'))
            return redirect("user_home");
        else
            return view("users.pages.password");
    }

    # user changePassword
    public function changePassword(Request $req)
    {
        $email = $req->input("email");
        $old_password = $req->input("old_password");
        $new_password = $req->input("new_password");

        $data = (array) DB::table("users_registration")
            ->where("email", $email)
            ->first();
        $id = $data['id'];

        if ($data) {
            $password = $data["password"];
            if (password_verify($old_password, $password)) {
                $create_password = password_hash($new_password, PASSWORD_BCRYPT);
                $info = UsersRegister::find($id);
                $info->password = $create_password;
                $info->save();

                session()->flash("msg", "Password Reset Successfully");
            }
        }
        return redirect("user_change_password");
    }

    # user homePage 
    public function homePage()
    {
        $offersData = DB::table("company_offers")
            ->join("company_registration", "company_registration.id", "company_offers.company_id")
            ->select("company_registration.*", "company_offers.*")
            ->get()
            ->toArray();

        $offers = [];
        foreach ($offersData as $data) {
            $offers[] = (array) $data;
        }

        $jobTitle = (array) DB::table("company_job_post")
            ->get()->toArray();

        $info = [];
        foreach ($jobTitle as $title) {
            $info[] = (array) $title;
        }

        if (session("gmail"))
            return view("users.pages.user_home", compact("offers", "info"));
        else
            return redirect("user_login");
    }

    # user showJob
    public function showJob(Request $req)
    {
        $data = $req->input("search_title") ?? "";

        $jobTitle = (array) DB::table("company_job_post")
            ->get()->toArray();

        $info = [];
        foreach ($jobTitle as $title) {
            $info[] = (array) $title;
        }

        if ($data != "") {
            $companyJob = DB::table("company_job_post")
                ->join("company_registration", "company_registration.id", "company_job_post.company_id")
                ->select("company_registration.*", "company_job_post.*")
                ->where("company_job_post.title", "like", "%" . $data . "%")
                ->get()
                ->toArray();

            $jobs = [];
            foreach ($companyJob as $data) {
                $jobs[] = (array) $data;
            }
            if (session('gmail'))
                return view("users.pages.user_job_show", compact("jobs","info"));
            else
                return redirect("user_login");
        }

        $companyJob = DB::table("company_job_post")
            ->join("company_registration", "company_registration.id", "company_job_post.company_id")
            ->select("company_registration.*", "company_job_post.*")
            ->get()
            ->toArray();

        $jobs = [];
        foreach ($companyJob as $data) {
            $jobs[] = (array) $data;
        }

        if (session('gmail'))
            return view("users.pages.user_job_show", compact("jobs","info"));
        else
            return redirect("user_login");
    }

    # user profilePage
    public function profilePage()
    {
        $usersIdea = DB::table("users_idea")
            ->join("users_registration", "users_registration.id", "users_idea.users_id")
            ->select("users_registration.*", "users_idea.*")
            ->get()
            ->toArray();

        $jobs = [];
        foreach ($usersIdea as $data) {
            $jobs[] = (array) $data;
        }

        $info = (array) DB::table("users_registration")
            ->where("email", session("gmail"))->first();

        if (session("gmail"))
            return view("users.pages.user_profile", compact("jobs", "info"));
        else
            return redirect("user_login");
    }

    # users profileData
    public function profileData(Request $req)
    {
        $data = DB::table("users_registration")->where("email", session("gmail"))->first();
        $id = $data->id;

        $title = $req->input("title");
        $description = $req->input("description");

        $idea = new UsersIdea;
        $idea->title = $title;
        $idea->description = $description;
        $idea->users_id = $id;
        $idea->save();

        session()->flash("idea_post_success", "Your post submit successfully");
        return redirect("user_profile");
    }

    # user updatePost
    public function updatePost(Request $req, $id = null)
    {
        $title = $req->input("title");
        $description = $req->input("description");

        $info = UsersIdea::find($id);
        $info->title = $title;
        $info->description = $description;
        $info->save();

        return redirect("user_profile");
    }

    # user deletePost
    public function deletePost($id = null)
    {
        $info = UsersIdea::find($id);
        $info->delete();

        return redirect("user_profile");
    }

    # user settingsPage
    public function settingsPage()
    {
        $info = (array) DB::table("users_registration")
            ->where("email", session("gmail"))
            ->first();

        if (session("gmail"))
            return view("users.pages.user_settings", compact("info"));
        else
            return redirect("user_login");
    }

    # user settingsUpdate 
    public function settingsUpdate(Request $req)
    {
        $name = $req->input("name");
        $email = $req->input("email");

        $profile_photo = $req->file("profile_photo");
        $profile_photo_name = rand() . "_" . time() . "_" . $profile_photo->getClientOriginalName();
        $profile_photo->storeAs("public/img/users/register/profile", $profile_photo_name);

        $cover_photo = $req->file("cover_photo");
        $cover_photo_name = rand() . "_" . time() . "_" . $cover_photo->getClientOriginalName();
        $cover_photo->storeAs("public/img/users/register/cover", $cover_photo_name);

        $birth_date = $req->input("birth-date");
        $address = $req->input("address");

        $data = (array) DB::table("users_registration")
            ->where("email", session("gmail"))->first();

        $id = $data['id'];

        $company_register = UsersRegister::find($id);
        $company_register->name = $name;
        $company_register->email = $email;
        $company_register->profile_photo = $profile_photo_name;
        $company_register->cover_photo = $cover_photo_name;
        $company_register->birth_date = $birth_date;
        $company_register->address = $address;
        $company_register->save();
        return redirect("user_settings");
    }

    # user watchPage 
    public function watchPage()
    {
        if (session("gmail")) {
            $arr = DB::table("company_watch")
                ->join("company_registration", "company_registration.id", "company_watch.company_id")
                ->select("company_registration.*", "company_watch.*")
                ->get()
                ->toArray();

            $newArr = [];
            foreach ($arr as $item) {
                $newArr[] = (array) $item;
            }

            $feedback = CompanyWatchFeedback::all()->toArray();
            return view("users.pages.user_watch", compact("newArr", "feedback"));
        } else
            return redirect("user_login");
    }

    # users logout 
    public function logoutPage()
    {
        if (session("gmail")) {
            session()->pull("gmail", null);
        }
        return redirect("user_login");
    }
}
