<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ["remember_token", "__token"];

    protected $primaryKey = "productId";

    // Logic to create mutator function
    public function setBrandNameAttribute($column){
        $this->attributes["brandName"] = trim($column);
    }
    public function setCategoryNameAttribute($column){
        $this->attributes["categoryName"] = trim($column);
    }
}
