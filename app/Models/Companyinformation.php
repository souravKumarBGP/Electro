<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyinformation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ["remember_token", "__token"];

}
