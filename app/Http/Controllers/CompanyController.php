<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\CompanyRegister;
use App\Models\CompanyOffers;
use App\Models\CompanyJobPost;
use App\Models\CompanyWatch;
use App\Models\CompanyWatchFeedback;
use App\Models\CompanyJobFeedback;

class CompanyController extends Controller
{

    # company registration page display
    public function registrationPage()
    {
        if (session("gmail"))
            return redirect("company_home");
        else
            return view("company.pages.register");
    }

    # company insert of users registration page
    public function registerDataSave(Request $req)
    {

        $name = $req->input("name");
        $email = $req->input("email");

        /* check email exist or not in database */
        $count =  DB::table("company_registration")->where("email", $email)->count();
        if ($count) {
            session()->flash("failed_msg", "Your Email is Already exist. Please try with another email.");
            return redirect("company_register");
        }

        $password = $req->input("password");
        $encrypt_password = password_hash($password, PASSWORD_BCRYPT);

        $profile_photo = $req->file("profile_photo");
        $profile_photo_name = rand() . "_" . time() . "_" . $profile_photo->getClientOriginalName();
        $profile_photo->storeAs("public/img/company/register/profile", $profile_photo_name);

        $cover_photo = $req->file("cover_photo");
        $cover_photo_name = rand() . "_" . time() . "_" . $cover_photo->getClientOriginalName();
        $cover_photo->storeAs("public/img/company/register/cover", $cover_photo_name);

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

        session()->flash("success_msg", "Registration Successfully Done.");
        return redirect("company_register");
    }

    # company login page display
    public function loginPage()
    {
        if (session("gmail")) {
            return redirect("company_home");
        }
        return view("company.pages.login");
    }

    # company login verify
    public function loginData(Request $req)
    {
        $email = $req->input("email");
        $password = $req->input("password");

        $data =  DB::table("company_registration")->where("email", $email)->first();
        $count = DB::table("company_registration")->where("email", $email)->count();
        if ($count == 1 and password_verify($password, $data->password)) {
            session()->put("gmail", $email);
            return redirect("company_home");
        }
        session()->flash("login_failed", "Email or password was incorrect.");
        return redirect("company_login");
    }

    # company passwordPage 
    public function passwordPage()
    {
        if (session('gmail'))
            return redirect("company_home");
        else
            return view("company.pages.password");
    }

    # company changePassword
    public function changePassword(Request $req) {
        $email = $req->input("email");
        $old_password = $req->input("old_password");
        $new_password = $req->input("new_password");

        $data = (array) DB::table("company_registration")
        ->where("email",$email)
        ->first();
        $id = $data['id'];

        if($data) {
            $password = $data["password"];
            if(password_verify($old_password,$password)) {
                $create_password = password_hash($new_password,PASSWORD_BCRYPT);
                $info = CompanyRegister::find($id);
                $info->password = $create_password;
                $info->save();

                session()->flash("msg","Password Reset Successfully");
            }
        }
        return redirect("company_change_password");
    }

    # company homePage 
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

        $usersIdea = DB::table("users_idea")
            ->join("users_registration", "users_registration.id", "users_idea.users_id")
            ->select("users_registration.*", "users_idea.*")
            ->get()
            ->toArray();

        $idea = [];
        foreach ($usersIdea as $data) {
            $idea[] = (array) $data;
        }

        if (session("gmail"))
            return view("company.pages.company_home", compact("offers", "idea"));
        else
            return redirect("company_login");
    }

    # company updateOffers
    public function updateOffers(Request $req, $id = null)
    {
        $title = $req->input("title");
        $description = $req->input("description");

        $info = CompanyOffers::find($id);
        $info->title = $title;
        $info->description = $description;
        $info->save();

        return redirect("company_home");
    }

    # company deleteOffers
    public function deleteOffers($id = null)
    {
        $info = CompanyOffers::find($id);
        $info->delete();

        return redirect("company_home");
    }

    # company offersData
    public function offersData(Request $req)
    {
        $data = DB::table("company_registration")->where("email", session("gmail"))->first();
        $id = $data->id;

        $title = $req->input("title");
        $description = $req->input("description");

        $info = new CompanyOffers;
        $info->title = $title;
        $info->description = $description;
        $info->company_id = $id;
        $info->save();

        session()->flash("offers_post_success", "Your post submit successfully");
        return redirect("company_home");
    }

    # company profilePage
    public function profilePage()
    {
        $companyJob = DB::table("company_job_post")
            ->join("company_registration", "company_registration.id", "company_job_post.company_id")
            ->select("company_registration.*", "company_job_post.*")
            ->get()
            ->toArray();

        $jobs = [];
        foreach ($companyJob as $data) {
            $jobs[] = (array) $data;
        }

        $info = (array) DB::table("company_registration")
            ->where("email", session("gmail"))->first();

        $jobFeedback = DB::table("company_job_feedback")
            ->join("company_registration", "company_registration.id", "company_job_feedback.company_id")
            ->select("company_registration.*", "company_job_feedback.*")
            ->get()
            ->toArray();

        $feedback = [];
        foreach ($jobFeedback as $item) {
            $feedback[] = (array) $item;
        }


        if (session("gmail"))
            return view("company.pages.company_profile", compact("jobs","feedback","info"));
        else
            return redirect("company_login");
    }

    # company jobPost
    public function jobPost(Request $req)
    {
        $data = (array) DB::table("company_registration")->where("email", session("gmail"))->first();
        $id = $data['id'];

        $title = $req->input("title");
        $description = $req->input("description");

        $info = new CompanyJobPost;
        $info->title = $title;
        $info->description = $description;
        $info->company_id = $id;
        $info->save();

        session()->flash("job_post_success", "Your post submit successfully");
        return redirect("company_profile");
    }

    # company updatePost
    public function updatePost(Request $req, $id = null)
    {
        $title = $req->input("title");
        $description = $req->input("description");

        $info = CompanyJobPost::find($id);
        $info->title = $title;
        $info->description = $description;
        $info->save();

        return redirect("company_profile");
    }

    # company deletePost
    public function deletePost($id = null)
    {
        $info = CompanyJobPost::find($id);
        $info->delete();

        return redirect("company_profile");
    }

    # company jobFeedback
    public function jobFeedback(Request $req)
    {
        $data = (array) DB::table("company_registration")
            ->where("email", session("gmail"))->first();

        $id = $data['id'];
        $comment = $req->input("comment");

        $info = new CompanyJobFeedback();
        $info->comment = $comment;
        $info->company_id = $id;
        $info->save();

        return redirect("company_profile");
    }

    # company deleteJobFeedback
    public function deleteJobFeedback($id = null)
    {
        $info = CompanyJobFeedback::find($id);
        $info->delete();

        return redirect("company_profile");
    }

    # company settingsPage
    public function settingsPage()
    {
        $info = (array) DB::table("company_registration")
            ->where("email", session("gmail"))
            ->first();

        if (session("gmail"))
            return view("company.pages.company_settings", compact("info"));
        else
            return redirect("company_login");
    }

    # company settingsUpdate 
    public function settingsUpdate(Request $req)
    {
        $name = $req->input("name");
        $email = $req->input("email");

        $profile_photo = $req->file("profile_photo");
        $profile_photo_name = rand() . "_" . time() . "_" . $profile_photo->getClientOriginalName();
        $profile_photo->storeAs("public/img/company/register/profile", $profile_photo_name);

        $cover_photo = $req->file("cover_photo");
        $cover_photo_name = rand() . "_" . time() . "_" . $cover_photo->getClientOriginalName();
        $cover_photo->storeAs("public/img/company/register/cover", $cover_photo_name);

        $birth_date = $req->input("birth-date");
        $address = $req->input("address");

        $data = (array) DB::table("company_registration")
            ->where("email", session("gmail"))->first();

        $id = $data['id'];

        $company_register = CompanyRegister::find($id);
        $company_register->name = $name;
        $company_register->email = $email;
        $company_register->profile_photo = $profile_photo_name;
        $company_register->cover_photo = $cover_photo_name;
        $company_register->birth_date = $birth_date;
        $company_register->address = $address;
        $company_register->save();
        return redirect("company_settings");
    }

    # company watchPage 
    public function watchPage()
    {
        if (session("gmail")) {
            $data = DB::table("company_registration")->where("email", session("gmail"))->first();
            $id = $data->id;

            $info = new CompanyWatch;
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
            return view("company.pages.company_watch", compact("newArr", "feedback"));
        } else
            return redirect("company_login");
    }

    # company watchData
    public function watchData(Request $req)
    {
        $data = DB::table("company_registration")->where("email", session("gmail"))->first();
        $id = $data->id;

        $title = $req->input("title");
        $description = $req->input("description");

        $info = new CompanyWatch;
        $info->url = $title;
        $info->description = $description;
        $info->company_id = $id;
        $info->save();

        session()->flash("watch_post_success", "Your post submit successfully");
        return redirect("company_watch");
    }

    # company updateWatch
    public function updateWatch(Request $req, $id = null)
    {
        $title = $req->input("title");
        $description = $req->input("description");

        $info = CompanyWatch::find($id);
        $info->url = $title;
        $info->description = $description;
        $info->save();

        return redirect("company_watch");
    }

    # company deleteWatch
    public function deleteWatch($id = null)
    {
        $info = CompanyWatch::find($id);
        $info->delete();

        return redirect("company_watch");
    }

    # company watchFeedback
    public function watchFeedback(Request $req)
    {

        $data = (array) DB::table("company_registration")
            ->where("email", session("gmail"))->first();

        $watchFeedback = DB::table("company_watch_feedback")
            ->join("company_registration", "company_watch_feedback.company_id", "company_registration.id")
            ->select("company_watch_feedback.*", "company_registration.*")
            ->get()
            ->toArray();

        $feedback = [];
        foreach ($watchFeedback as $item) {
            $feedback[] = (array) $item;
        }

        $id = $data['id'];
        $comment = $req->input("comment");

        $info = new CompanyWatchFeedback;
        $info->comment = $comment;
        $info->company_id = $id;
        $info->save();

        return redirect("company_watch");
    }

    # company deleteFeedback
    public function deleteFeedback($id = null)
    {
        $info = CompanyWatchFeedback::find($id);
        $info->delete();

        return redirect("company_watch");
    }

    # company logout 
    public function logoutPage()
    {
        if (session("gmail")) {
            session()->pull("gmail", null);
        }
        return redirect("company_login");
    }
}
