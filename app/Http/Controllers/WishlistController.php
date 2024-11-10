<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Wishlist::join("products", "wishlists.productId", "=", "products.productId")->where("userId", Auth::id())->get(["products.productId", "products.productName", "products.sellPrice", "products.abalibleQuantity","products.productThemainal"]);

        return view("shop.wishlist", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Apply server side validation
        $request->validate([
            "userId"=> "required|exists:users,id",
            "productId"=> "required|exists:products,productId"
        ]);

        $result = Wishlist::create($request->all());

        if($result){
            return back()->with("message","Wishlist saved successfully");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Wishlist::where("productId",$id)->delete();
        if($result){
            return redirect()->back()->with("message", "Delete items form wishlist");
        }
    }
}
