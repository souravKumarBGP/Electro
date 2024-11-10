<?php

namespace App\Http\Controllers;

use App\Models\Parentcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentcategoryController extends Controller
{

    // Logic to create a method to show category list
    public function index(){

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            if(Parentcategory::count() == 0){

                return view("admin.categories.parentCategory.index", ["data"=> Null]);
            }else{

                $data = Parentcategory::paginate(4);
                return view("admin.categories.parentCategory.index", compact("data"));
            }

        }else{
            return redirect()->route("admin.login");
        }

    }

    // Logic to create a method to show create category form
    public function create(){

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            return view("admin.categories.parentCategory.create");
        }else{
            return redirect()->route("admin.login");
        }
    }

    // Logic to create a method to stored new category
    public function store(Request $request){

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            $request->validate([
                "categoryName"=> "required|max:200|string|unique:parentcategories,categoryName",
                "discreption"=> "required|max:400|string",
                "picture"=> "required|mimetypes:image/jpeg,image/png,image/jpg,image/webp|max:2048"
            ]);

            $file = $request->file("picture");
            $path = $file->store("assets/img/categories/parent", "public");

            $result = Parentcategory::create([
                "categoryname"=> $request->categoryName,
                "discreption"=> $request->discreption,
                "picture"=> $path
            ]);
            if($result){
                return redirect()->route("admin.category");
            }else{
                return back()->with("message", "Something went wrong!");
            }
        }else{
            return redirect()->route("admin.login");
        }

    }

    // Logic to create a method to show edit category form
    public function edit(string $id){

        if(Auth::check() && Auth::user()->role == "admin"){

            session()->regenerate();

            if(Parentcategory::where("categoryId", $id)->count() == 1){

                session()->regenerate();
                $data = Parentcategory::findorFail($id)->first();

                return view("admin.categories.parentCategory.edit", compact("data"));
            }else{

                return redirect()->route("admin.category");
            }
        }else{
            return redirect()->route("admin.login");
        }

    }

    public function update(Request $request, string $id){

        if(Auth::check() && Auth::user()->role == "admin"){

            session()->regenerate();

            if(Parentcategory::where("categoryId", $id)->count() == 1){

                session()->regenerate();

                $request->validate([
                    "categoryName"=> "required|max:200|string",
                    "discreption"=> "required|max:400|string",
                    "picture"=> "required|mimetypes:image/jpeg,image/png,image/jpg,image/webp|max:2048"
                ]);

                $oldImagePath = (Parentcategory::findorfail($id)->first("picture"))->picture;
                $path_old_image = public_path()."/storage/".$oldImagePath;
                unlink($path_old_image);

                $file = $request->file("picture");
                $path = $file->store("assets/img/categories/parent", "public");

                $result = Parentcategory::findorFail($id)->update([
                    "categoryname"=> $request->categoryName,
                    "discreption"=> $request->discreption,
                    "picture"=> $path
                ]);
                if($result){

                    return redirect()->route("admin.category");
                }else{
                    return back()->with("message", "Something went wrong!");
                }

            }else{

                return redirect()->route("admin.category");
            }
        }else{
            return redirect()->route("admin.login");
        }


    }

    // Logic to create a method to destroy sepcified category
    public function destroy(string $id){

        if(Auth::check() && Auth::user()->role == "admin"){
            session()->regenerate();

            if(Parentcategory::where("categoryId", $id)->count() == 1){

                $oldImagePath = (Parentcategory::findorfail($id)->first("picture"))->picture;
                $path = public_path()."/storage/".$oldImagePath;
                unlink($path);

                $result = Parentcategory::findorFail($id)->delete();

                if($result){

                    return redirect()->route("admin.category");
                }
            };
        }else{
            return redirect()->route("admin.login");
        }

    }

}
