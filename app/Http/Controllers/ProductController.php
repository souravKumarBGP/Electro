<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Childcategory;
use App\Models\Product;
use App\Models\Parentcategory;
// use App\Models\Productgallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the products items.
     */
    public function index()
    {

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            // Logic to fetch products data
            $data = Product::paginate(5);

            return view("admin.products.index", compact("data"));
        }else{
            return redirect()->route("admin.login");
        }
    }

    // Logic to create a method to show create new products page
    public function create()
    {
        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            $brandName = Brand::get("name");
            $categoryName = Parentcategory::get("categoryName");
            $childCategoryName = Childcategory::get("childCategoryName");

            return view("admin.products.create", ["brandName"=> $brandName, "categoryName"=> $categoryName, "childCategoryName"=> $childCategoryName]);

        }else{
            return redirect()->route("admin.login");
        }

    }

    // Logic to creae a methods and insert new product into database after serverside validation
    public function store(Request $request)
    {

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            // Logic to applay server side validation
            $request->validate([

                "productName"=> "required|string|max:255",
                "mrp"=> "required|numeric",
                "sellPrice"=> "required|numeric",
                "categoryName" => "required|string|exists:parentcategories,categoryName",
                "childCategoryName" => "required|string|exists:childcategories,childCategoryName",
                "brandName" => "required|string|exists:brands,name",
                "unite"=> "required|string|",
                "totalQuantity"=> "required|numeric",
                "productDiscreption"=> "required|string",
                "thumbnailImage"=> "required|mimetypes:image/jpeg,image/jpg,image/png,image/webp|max:2048",
                "generalImage"=> "required|mimetypes:image/jpeg,image/jpg,image/png,image/webp|max:2048"
            ]);

            // Logic to after compleating validation insert data into database
            $thumbnailImageFile = $request->file("thumbnailImage");
            $generalImageFile = $request->file("generalImage");

            $thumbnailImagePath = $thumbnailImageFile->store("assets/img/products", "public");
            $generalImagePath = $generalImageFile->store("assets/img/products", "public");

            // Logic to create slug
            $slug = strtolower($request->productName);
            $slug = str_replace(" ", "-", $slug);

            // Logic to create SKU (Stock Kipping Unit)
            $sku = substr($request->productName, 0, 5);
            $sku = str_replace(" ", "", $sku);
            $sku = substr($sku, 0, 5).rand(1000, 9999);


            $result = Product::create([

                "productName"=> $request->productName,
                "slug"=> $slug,
                "sku"=> $sku,
                "productDiscreption"=> $request->productDiscreption,
                "unite"=> $request->unite,
                "brandName"=> $request->brandName,
                "categoryName"=> $request->categoryName,
                "childCategoryName"=> $request->childCategoryName,
                "mrp"=> $request->mrp,
                "sellPrice"=> $request->sellPrice,
                "abalibleQuantity"=> $request->totalQuantity,
                "productThemainal"=> $thumbnailImagePath,
                "generalImage"=> $generalImagePath,
            ]);

            if($result){
                return redirect()->route("products.create")->with("message", "Product insert successfully");
            }else{
                return back()->with("message", "Something went wrong. Try after some time !");
            }
        }else{
            return redirect()->route("admin.login");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $products)
    {
        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){
            return "This is product show methods";
        }else{
            return redirect()->route("admin.login");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){


            $product = Product::findorFail($id);

            // return $product;


            $brandName = Brand::get("name");
            $categoryName = Parentcategory::get("categoryName");
            $childCategoryName = Childcategory::get("childCategoryName");

            return view("admin.products.edit", compact("product", "brandName", "categoryName", "childCategoryName"));
        }else{
            return redirect()->route("admin.login");
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            // Logic to applay server side validation
            $request->validate([

                "productName"=> "required|string|max:255",
                "mrp"=> "required|numeric",
                "sellPrice"=> "required|numeric",
                "categoryName" => "required|string|exists:parentcategories,categoryName",
                "childCategoryName" => "required|string|exists:childcategories,childCategoryName",
                "brandName" => "required|string|exists:brands,name",
                "unite"=> "required|string|",
                "totalQuantity"=> "required|numeric",
                "productDiscreption"=> "required|string",
                "thumbnailImage"=> "required|mimetypes:image/jpeg,image/jpg,image/png,image/webp|max:2048",
                "generalImage"=> "required|mimetypes:image/jpeg,image/jpg,image/png,image/webp|max:2048"
            ]);

            // Logic to get old image path and removing it after removing insert new image
            $productThemainalImgPath = (Product::where("productId", $id)->get("productThemainal"))->first()->productThemainal;
            $generalImagePath = (Product::where("productId", $id)->get("generalImage")->first())->generalImage;

            unlink(public_path()."/storage/".$productThemainalImgPath);
            unlink(public_path()."/storage/".$generalImagePath);

            // Logic to after compleating validation insert data into database
            $thumbnailImageFile = $request->file("thumbnailImage");
            $generalImageFile = $request->file("generalImage");

            $thumbnailImagePath = $thumbnailImageFile->store("assets/img/products", "public");
            $generalImagePath = $generalImageFile->store("assets/img/products", "public");

            // Logic to generate slugn dynamically
            $slug = strtolower($request->productName);
            $slug = str_replace(" ", "-", $slug);

            // Logic to create SKU (Stock Kipping Unit)
            $sku = substr($request->productName, 0, 5);
            $sku = str_replace(" ", "", $sku);
            $sku = substr($sku, 0, 5).rand(1000, 9999);


            $result = Product::findorFail($id)->update([

                "productName"=> $request->productName,
                "slug"=> $slug,
                "sku"=> $sku,
                "productDiscreption"=> $request->productDiscreption,
                "unite"=> $request->unite,
                "brandName"=> $request->brandName,
                "categoryName"=> $request->categoryName,
                "childCategoryName"=> $request->childCategoryName,
                "mrp"=> $request->mrp,
                "sellPrice"=> $request->sellPrice,
                "abalibleQuantity"=> $request->totalQuantity,
                "productThemainal"=> $thumbnailImagePath,
                "generalImage"=> $generalImagePath,
            ]);

            if($result){
                return redirect()->route("products.create")->with("message", "Product updated successfully");
            }else{
                return back()->with("message", "Something went wrong. Try after some time !");
            }

        }else{
            return redirect()->route("admin.login");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        session()->regenerate();

        if(Auth::check() && Auth::user()->role == "admin"){

            // Logic to get old image path and removing it
            $productThemainalImgPath = (Product::where("productId", $id)->get("productThemainal"))->first()->productThemainal;
            $generalImagePath = (Product::where("productId", $id)->get("generalImage")->first())->generalImage;

            unlink(public_path()."/storage/".$productThemainalImgPath);
            unlink(public_path()."/storage/".$generalImagePath);

            // Logic to delete recort form the database
            $result = Product::findorFail($id)->delete();

            if($result){
                return redirect()->route("products.index")->with("message", "Product deleted successfully");
            }else{
                return back()->with("message", "Something went wrong. Try after some time !");
            }

        }else{

            return redirect()->route("admin.login");
        }

    }
}
