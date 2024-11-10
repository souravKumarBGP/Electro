<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productgallary;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Logi to create a method to show home page dynamicly
    public function index(){

        return view('home');
    }

    // Logic to crete a method to show product details page
    public function show(string $slug){

        $products = Product::join("brands", "products.brandName", "=", "brands.name")->select("products.*", "brands.logo")->where("products.slug", $slug)->first();

        $gallaryImages = Productgallary::where("productId", $products->productId)->get("gallaryImg");

        return (empty($products)) ? abort(404): view("shop.single-product-extended", compact("products", "gallaryImages"));
    }
}
