<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{

    // Just for testing purpus i can deleting this data
    // public function fetch(Request $request) {
    //     return response()->json($request->all()); // Return all request data as JSON
    // }

    // Logic to create customer registration method
    public function customerRegistration(Request $request){

        // Apply some following validation
        $request->validate([

            "name"=> "required|string|max:150",
            "gender"=> "required|string|max:150",
            "email"=> "required|email|unique:users,email|max:150",
            "password"=> "required|alpha_num|min:8|max:150",
            "confirmPassword"=> "required|same:password"
        ],["email.unique"=> "This email id has been already registred. Enter another email !"]);

        $result = User::create([
            "name"=> $request->name,
            "gender"=> $request->gender,
            "email"=> $request->email,
            "password"=> $request->password
        ]);

        if($result){
            return redirect()->route("homePage")->with("message", "Registration success fully.");
        }else{
            return back()->with("message", "Something went wrong. Try after some time !");
        }
    }

    // Logic to create a method to perform  customer login operations
    public function customerLogin(Request $request){

        if(Auth::attempt($request->only("email", "password"))){

            // return view("home");

            return json_encode(["status"=> 1, "userName"=> Auth::user()->name]); // 1 means true (credential valid)
        }else{
            return  json_encode(["status"=> 0]); // 0 means false (wrong credential)
        }
    }

    // Logic to create method to perform customer logout operations
    public function customerLogout(){
        Auth::logout();
        session()->regenerate();
        return redirect()->route("homePage");
    }


}
