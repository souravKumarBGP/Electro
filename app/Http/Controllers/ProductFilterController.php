<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFilterController extends Controller
{
    // Logic to create a method to filter products
    public function index(Request $request){

        // $products = Product::all();
        // return $products;

        if($request->q){
            $q = $request->q;
            $products = Product::whereRaw("productName like '%$q%'")->paginate(25);

        }else{
            $products = Product::paginate(25);
        }

        $brands = DB::table("products")->selectRaw("brandName, count(brandName) as totalBrand")->groupBy("brandName")->get();

        $childCategoryName = Product::select('childCategoryName')->distinct()->get();

        return view("shop.shop-grid", compact("brands", "products", "childCategoryName"));
    }
}
