<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = ["remember_token", "__token", "brandId"];

    protected $primaryKey = "brandId";

    public $timestamps = false;


}
