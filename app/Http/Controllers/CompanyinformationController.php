<?php

namespace App\Http\Controllers;

use App\Models\Companyinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyinformationController extends Controller
{

    // Logic to create a method to show company information page
    public function index()
    {

        session()->regenerate();

        // Logic to check admin is login or not if the admin is not login then show admin login page
        if(Auth::check() && Auth::user()->role == "admin"){

            $data = Companyinformation::first();

            return view("admin.appInforamtion.companyinfo.index", compact("data"));
        }else{
            return redirect()->route("admin.login");
        }
    }

    // Logic to create a method to show company information edit page
    public function edit(string $id)
    {

        session()->regenerate();

        // Logic to check admin is login or not if the admin is not login then show admin login page
        if(Auth::check() && Auth::user()->role == "admin"){

            $data = Companyinformation::findorFail($id)->first();
            return view("admin.appInforamtion.companyinfo.edit", compact("data"));
        }else{
            return redirect()->route("admin.login");
        }


    }

    // Logic to create a method to show company information edit page
    public function update(Request $request, string $id)
    {

        if(Auth::check() && Auth::user()->role == "admin"){

            session()->regenerate();

            $request->validate([
                "companyName"=> "required|string|max:255",
                "companyLogo"=> "required|mimetypes:image/png,,image/webp,,image/jpg,,image/jpeg|max:2048",
                "customerCareNo"=> "required|string|max:255",
                "helpLineNo"=> "required|string|max:255",
                "copyRight"=> "required|string|max:255",
                "appVersion"=> "required|string|max:255",
                "facebookLinks"=> "required|string|max:255",
                "linkedinLinks"=> "required|string|max:255",
                "tutreLinks"=> "required|string|max:255",
                "whatsaapLinks"=> "required|string|max:255",
                "companyAddress"=> "required|string|max:255",
                "companyEmail"=> "required|string|max:255",
            ]);


            // Remove old image
            $oldImgPath = (Companyinformation::findorFail($id)->first())->companyLogo;
            unlink(public_path()."/storage/".$oldImgPath);

            // Update new data
            $file = $request->file("companyLogo");
            $path = $file->store("assets/img/companyinfo", "public");

            $result = Companyinformation::findorFail($id)->update([
                "companyName"=> $request->companyName,
                "companyLogo"=> $path,
                "customerCareNo"=> $request->customerCareNo,
                "helpLineNo"=> $request->helpLineNo,
                "copyRight"=> $request->copyRight,
                "appVersion"=> $request->appVersion,
                "facebookLinks"=> $request->facebookLinks,
                "linkedinLinks"=> $request->linkedinLinks,
                "tutreLinks"=> $request->tutreLinks,
                "whatsaapLinks"=> $request->whatsaapLinks,
                "companyAddress"=> $request->companyAddress,
                "companyEmail"=> $request->companyEmail,
            ]);

            if($result){
                return redirect()->route("companyinfo.index")->with("message", "Company Information edit successfully");
            }else{
                return redirect()->back()->with("Something went wrong. Try after sometime !");
            }

        }else{
            return redirect()->route("admin.login");
        }

    }


}
