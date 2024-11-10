<?php

namespace App\Http\Controllers;

use App\Models\Childcategory;
use App\Models\Parentcategory;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class ChildcategoryController extends Controller
{

    // Logic to create a method to show child category page
    public function index(){

        session()->regenerate();

        $data = Childcategory::paginate(5);
        return view("admin.categories.childCategory.index", compact("data"));
    }

    // Logic to create a method to show create new child category page
    public function create(){

        session()->regenerate();
        $categoryName = Parentcategory::all("categoryName");

        return view("admin.categories.childCategory.create", compact("categoryName"));
    }

    // Logic to create a method to stored new child category
    public function stored(Request $request){

        session()->regenerate();
        // Logic to apply server side validation
        $request->validate([

            "childCategoryName"=> "required|string|max:255",
            "categoryName"=> "required|exists:parentcategories,categoryName",
            "discreption"=> "required|string",
            "categoryImage"=> "required|mimetypes:image/jpeg,image/png,image/jpg,image/webp|max:2048",
        ]);

        // After validation logic to stored data into database and image stored in stored folder
        $file = $request->file("categoryImage");
        $imgPath = $file->Store("assets/img/categories/child", "public");

        $result = Childcategory::create([

            "childCategoryName"=> $request->childCategoryName,
            "categoryName"=> $request->categoryName,
            "discreption"=> $request->discreption,
            "categoryImage"=> $imgPath,
        ]);

        if($result){
            return redirect()->route("childcategories.create")->with("message", "Category created successfully");
        }else{
            return back()->with("message", "Something went wrong. Try after some time !");
        }
    }

    // Logic to create a method to show child category edit form
    public function edit(string $id){

        $data = Childcategory::findorFail($id)->first();
        $parentCategory = Childcategory::all("categoryName");
        return view("admin.categories.childCategory.edit", compact("data", "parentCategory"));
    }

    // Logic to create a method to update child category data
    public function update(Request $request, string $id){

        session()->regenerate();
        // Logic to apply server side validation
        $request->validate([

            "childCategoryName"=> "required|string|max:255",
            "categoryName"=> "required|exists:parentcategories,categoryName",
            "discreption"=> "required|string",
            "categoryImage"=> "required|mimetypes:image/jpeg,image/png,image/jpg,image/webp|max:2048",
        ]);

        // Get old image path and unlink old image
        $oldImgPath = (Childcategory::findorFail($id)->first("categoryImage"))->categoryImage;
        unlink(public_path()."/storage/".$oldImgPath);

        $file = $request->file("categoryImage");
        $imgPath = $file->Store("assets/img/categories/child", "public");

        $result = Childcategory::findorFail($id)->update([

            "childCategoryName"=> $request->childCategoryName,
            "categoryName"=> $request->categoryName,
            "discreption"=> $request->discreption,
            "categoryImage"=> $imgPath,
        ]);

        if($result){
            return redirect()->route("childcategories.index")->with("message", "Category created successfully");
        }else{
            return back()->with("message", "Something went wrong. Try after some time !");
        }

    }

    // Logic to create a method to destroy record and releted files
    public function destroy(string $id){

        // Get old image path and unlink old image
        $oldImgPath = (Childcategory::findorFail($id)->first("categoryImage"))->categoryImage;
        unlink(public_path()."/storage/".$oldImgPath);

        $result = Childcategory::findorFail($id)->delete();

        if($result){
            return redirect()->route("childcategories.index")->with("message", "Category created successfully");
        }else{
            return back()->with("message", "Something went wrong. Try after some time !");
        }

    }

}
