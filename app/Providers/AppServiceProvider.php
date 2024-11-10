<?php

namespace App\Providers;

use App\Models\Childcategory;
use App\Models\Parentcategory;
use App\Models\Companyinformation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Logic to share company information globally
        $companyInfo = Companyinformation::first();
        View::share('companyInfo', $companyInfo);

        $parentCategory = Parentcategory::orderBy("categoryName", "asc")->get(["categoryName", "categoryId"]);
        view::share("parentCategory", $parentCategory);

        $childCategory = Childcategory::orderBy("childCategoryName", "asc")->get(["childCategoryName", "id"]);
        view::share("childCategory", $childCategory);
    }
}
