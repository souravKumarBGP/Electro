<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    // Logic to create a method to show admin login page
    public function showAdminLoginPage()
    {
        session()->regenerate();

        // Logic to check admin is logout if admin is logout then show admin login page
        if(Auth::check() && Auth::user()->role == "admin"){

            return redirect()->route("admin.dashbord");
        }elseif(Auth::check() && Auth::user()->role == "customer"){

            session()->regenerate();
            Auth::logout();
            return redirect()->route("homePage");
        }else{

            return view("admin.login");
        }
    }

    // Logic to create a method to show dashbor page
    public function showDashbordPage(){

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){ // Logic to check janewin admin is login or not

            return view("admin.dashbord");
        }else{

            session()->regenerate();
            Auth::logout();
            return redirect()->route("admin.login");
        }
    }

    // Logic to perform login request operations
    public function loginRequest(Request $loginRequestData)
    {
        $credentials = $loginRequestData->validate([

            "email"=> "required|email|exists:users,email|max:150",
            "password"=> "required|alpha_num|max:150"

        ], ["email.exists" => "This email is not registred !", "email.email"=> "Enter valid email id !"]);

        session(["loginEmail" => $loginRequestData->email]); // Logic to store a login email in session because user submit the form and password is incorrect then bydefault show email is

        if(Auth::attempt($credentials)){

            session()->forget("loginEmail"); // if all credentials is true then remove loginEmail session

            // return "ok";
            return redirect()->route("admin.dashbord");
            // return view("admin.dashbord");
        }else{
            return back()->withErrors(["password"=> "Enter valid password !"]);
        }

    }

    // Logic to create logout methods
    public function logout()
    {
        Auth::logout();

        return redirect()->route("admin.login");
    }

}
