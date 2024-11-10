<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Logic to create a method to show cart page
    public function index(){

        session()->regenerate();

        $data = Cart::join("products", "products.productId", "=", "carts.productId")->where("userId", Auth::id())->get(["products.productId", "productName", "sellPrice", "productThemainal"]);

        $subTotal = collect($data)->sum("sellPrice");

        $gst = 10;

        $grandTotal = round(($subTotal * $gst / 100)+ $subTotal);

        $cartCount = Cart::where('userId', Auth::id())->count();

        // View::share(compact("cartCount", "subTotal"));
        View::share("cartCount", $cartCount);

        return view("shop.cart", compact("data", "subTotal", "gst", "grandTotal"));
    }

    // Logic to create a method to store cart data into database
    public function store(Request $request){

        session()->regenerate();

        // Apply server side validation
        $request->validate([
            "userId"=> "required|exists:users,id",
            "productId"=> "required|exists:products,productId"
        ]);

        $result = Cart::create($request->all());

        if($result){
            return back()->with("message","Cart saved successfully");
        }else{
            return back()->with("message", "Something went wrong. try after some time!");
        }

    }

    public function destroy(string $id){

        session()->regenerate();

        Cart::where("productId", $id)->delete();
        return back()->with("message", "Cart deleted successfully");
    }
}
