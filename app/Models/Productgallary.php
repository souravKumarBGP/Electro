<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productgallary extends Model
{
    use HasFactory;

    protected $guarded = ["remember_token", "__token"];

    public $timestamps = false;
}
