
<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChildcategoryController;
use App\Http\Controllers\ParentcategoryController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyinformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductFilterController;
use App\Http\Controllers\ProductgallaryController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

// ************************************************ Frontend routes **********************************************************
// Common app.blade.php route

Route::get('/', [HomeController::class, 'index'])->name('homePage');

// show amin login page
Route::get("/admin", [AdminAuthController::class, "showAdminLoginPage"]);

// Product details page
Route::get("/{slug?}", [HomeController::class, 'show'] )->name("shop.single-product-extended");

Route::get("/faq", function(){
    return view("faq");
})->name("faq");

Route::get("/store-directory", function(){
    return view("store-directory");
})->name("store-directory");

Route::get("/terms-and-conditions", function(){
    return view("terms-and-conditions");
})->name("terms-and-conditions");

Route::get("/about", function(){
    return view("about");
})->name("about");

Route::get("/contact-v2", function(){
    return view("contact-v2");
})->name("contact-v2");

Route::prefix("/shop")->group(function(){  // ********** Create shop page routes group

    Route::get("/shop-grid", [ProductFilterController::class, "index"])->name("shop.shop-grid");

    Route::get("/my-account", function(){ return view("shop.my-account"); })->name("shop.my-account");

    Route::get("/track-your-order", function(){ return view("shop.track-your-order"); })->name("shop.track-your-order");

    Route::get("/compare", function(){ return view("shop.compare"); })->name("shop.compare");

    Route::get("/shop", function(){ return view("shop.shop"); })->name("shop.shop");

    Route::get("/checkout", function(){ return view("shop.checkout"); })->name("shop.checkout");

    Route::resource('/wishlist', WishlistController::class);

    Route::get("/cart",[CartController::class, "index"])->name("shop.cart");
    Route::post("/cart/store",[CartController::class, "store"])->name("cart.store");
    Route::delete("/cart/destroy/{id?}",[CartController::class, "destroy"])->name("cart.destroy");

});



// ************************************************ Backends routes **********************************************************
// Logic to handle admin authentication action
Route::prefix("/admin")->controller(AdminAuthController::class)->group(function(){

    Route::get("/", "showAdminLoginPage")->name("admin.login");

    Route::get("/login", "showAdminLoginPage")->name("admin.login");

    Route::get("/dashbord", "showDashbordPage")->name("admin.dashbord");

    Route::post("/loginrequest", "loginRequest")->name("admin.loginRequest");

    Route::get("/logout", "logout")->name("admin.logout");

});

// Logic to create routes to handle admin parent category
Route::prefix("/admin/parent/category")->controller(ParentcategoryController::class)->group(function(){

    Route::get("/", "index")->name("admin.category");

    Route::get("/create", "create")->name("admin.createCategory");

    Route::Post("/stored", "store")->name("admin.storedCategory");

    Route::get("/edit/{id}", "edit")->name("admin.editCategory")->whereNumber("id");

    Route::post("/update/{id}", "update")->name("admin.updateCategory")->whereNumber("id");

    Route::delete("/destroy/{id}", "destroy")->name("admin.destroyCategory")->whereNumber("id");

});

// Logic to create routes to handle admin child category
Route::prefix("/admin/child/category")->controller(ChildcategoryController::class)->group(function(){

    Route::get("/", "index")->name("childcategories.index");

    Route::get("/create", "create")->name("childcategories.create");

    Route::post("/stored", "stored")->name("childcategories.stored");

    Route::get("/edit/{id}", "edit")->name("childcategories.edit")->whereNumber("id");

    Route::put("/update/{id}", "update")->name("childcategories.update")->whereNumber("id");

    Route::delete("/destroy/{id}", "destroy")->name("childcategories.destroy")->whereNumber("id");

});

// Logic to create route to handle admin brands
Route::prefix("/admin/brands")->controller(BrandController::class)->group(function(){

    Route::get("/", "index")->name("admin.brands.index");

    Route::get("/create", "create")->name("admin.brands.create");

    Route::post("/stored", "stored")->name("admin.brands.stored");

    Route::get("/edit/{id}", "edit")->name("admin.brands.edit")->whereNumber("id");

    Route::post("/update/{id}", "update")->name("admin.brands.update")->whereNumber("id");

    Route::delete("/stored/{id}", "destroy")->name("admin.brands.destroy")->whereNumber("id");
});

// Logic to create route to handle admin products
Route::resource("admin/products", ProductController::class);

// Logic to create a route to handle admin products Gallary image
Route::resource("admin/product/gallary", ProductgallaryController::class);
Route::get("admin/product/gallary/index/{id?}", [ProductgallaryController::class, "index2"])->name("gallary.index2");

// Logic to create a route to handle company information
Route::prefix("/admin/companyinfo")->controller(CompanyinformationController::class)->group(function(){

    Route::get("/", "index")->name("companyinfo.index");

    Route::get("/edit/{id}", "edit")->name("companyinfo.edit")->whereNumber("id");

    Route::put("/update/{id}", "update")->name("companyinfo.update")->whereNumber("id");
});

// Logic to handle customer authentication action
Route::prefix("customer")->controller(CustomerAuthController::class)->group(function(){

    // Route::Post("/fetchdata", "fetch")->name("fetch");

    Route::Post("/registration", "customerRegistration")->name("customer.registration");

    Route::post("/login", "customerLogin")->name("customer.login");

    Route::get("/logout", "customerLogout")->name("customer.logout");

});
