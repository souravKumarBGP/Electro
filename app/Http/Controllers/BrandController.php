<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{

    // Logic to create a method to show brands page
    public function index(){

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            $data = Brand::paginate(5);

            return view("admin.brands.brands", compact("data"));
        }else{

            return redirect()->route("admin.login");
        }
    }

    // Logic to create a method to show creae new brand form
    public function create(){

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            return view("admin.brands.createBrands");
        }else{

            return redirect()->route("admin.login");
        }
    }

    // Logic to create a method to show creae new brand form
    public function stored(Request $request){

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            $request->validate([

                "brandName"=> "required|string|max:255|unique:brands,name",
                "metaTitle"=> "required|string|max:500",
                "metaDiscreption"=> "required|string|max:5000",
                "logo"=> "required|mimetypes:image/jpeg,image/png,image/jpg,image/webp|max:2048"
            ]);

            $file = $request->file("logo");

            $path = $file->store("assets/img/brands", "public");

            $result = Brand::create([

                "name"=> $request->brandName,
                "logo"=> $path,
                "metaTitle"=> $request->metaTitle,
                "metaDiscreption"=> $request->metaDiscreption
            ]);

            if($result){

                return redirect()->route("admin.brands.create")->with("message", "Data insert success full");
            }else{

                return back()->with("message", "Something went wrong !");
            }

        }else{

            return redirect()->route("admin.login");
        }

    }

    // Logic to create a method to show edit brand page
    public function edit(String $id){

        if(Brand::where("brandId", $id)->count() == 1 && Auth::check() && Auth::user()->role == "admin"){

            $data = Brand::findorFail($id);

            return view("admin.brands.edit", compact("data"));
        }

    }

    // Logic to create a method to perform brand update operation
    public function update(Request $request, string $id){
        session()->regenerate();

        if(Brand::where("brandId", $id)->count() == 1 && Auth::check() && Auth::user()->role == "admin"){

            $request->validate([

                "brandName"=> "required|string|max:255",
                "metaTitle"=> "required|string|max:500",
                "metaDiscreption"=> "required|string|max:5000",
                "logo"=> "required|mimetypes:image/jpeg,image/png,image/jpg,image/webp|max:2048"
            ]);

            $oldImgPath = (Brand::findorFail($id))->logo;
            $oldPath = public_path()."/storage/".$oldImgPath;

            unlink($oldPath);

            $file = $request->file("logo");

            $path = $file->store("assets/img/brands", "public");

            $result = Brand::findorFail($id)->update([

                "name"=> $request->brandName,
                "logo"=> $path,
                "metaTitle"=> $request->metaTitle,
                "metaDiscreption"=> $request->metaDiscreption
            ]);

            if($result){

                return redirect()->route("admin.brands.create")->with("message", "Data updated success full");
            }else{

                return back()->with("message", "Something went wrong !");
            }

        }else{

            return redirect()->route("admin.login");
        }

    }

    // Logic to create a method to perform destroy brands
    public function destroy(string $id){

        if(Brand::where("brandId", $id)->count() == 1 && Auth::check() && Auth::user()->role == "admin"){

            $oldImgPath = (Brand::findorFail($id))->logo;
            $oldPath = public_path()."/storage/".$oldImgPath;

            unlink($oldPath);

            $result = Brand::findorFail($id)->delete();

            if($result){
                return redirect()->route("admin.brands.index");
            }

        }else{
            return redirect()->route("admin.brands.index");
        }


    }

}
