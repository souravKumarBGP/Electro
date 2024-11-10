<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productgallary;
use Illuminate\Http\Request;

class ProductgallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index2(string $id)
    {

        $data = Productgallary::join("products", "productgallaries.productId", "=", "products.productId")->select("productgallaries.*")->where("productgallaries.productId", $id )->get();
        return view("admin.productGallary.index", compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            "productId"=> "required|exists:products,productId",
            "gallaryImg"=> "required|array|size:5",
            "gallaryImg.*"=>"mimetypes:image/png,image/jpg,image/jpeg,image/webp,image/svg|max:2048"
        ]);

        $file = $request->file("gallaryImg");

        foreach($file as $items){

            $path = $items->store("assets/img/productGallaryImg", "public");

            $result = Productgallary::create([
                "productId"=> $request->productId,
                "gallaryImg"=> $path
            ]);

        }

        if($result){
            return redirect()->route("products.index");
        }else{
            return back()->with("message", "Something went wrong!");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::select(["productId", "productName"])->findorFail($id);

        return view("admin.productGallary.create", compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = Product::select(["productId", "productName"])->findorFail($id);
        return view("admin.productGallary.edit", compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            "productId"=> "required|exists:products,productId",
            "productId"=> "required|exists:productgallaries,productId",
            "gallaryImg"=> "required|array|size:5",
            "gallaryImg.*"=>"mimetypes:image/png,image/jpg,image/jpeg,image/webp,image/svg|max:2048"
        ]);

        $oldGallaryImgPath = Productgallary::where("productId",$id)->get("gallaryImg");
        foreach($oldGallaryImgPath as $items){
            $oldPath = public_path()."/storage/".$items->gallaryImg;
            unlink($oldPath);
        }

        Productgallary::where("productId",$id)->delete();


        $file = $request->file("gallaryImg");

        foreach($file as $items){

            $path = $items->store("assets/img/productGallaryImg", "public");

            $result = Productgallary::create([
                "productId"=> $request->productId,
                "gallaryImg"=> $path
            ]);

        }

        if($result){
            return redirect()->route("products.index");
        }else{
            return back()->with("message", "Something went wrong!");
        }
    }

}
