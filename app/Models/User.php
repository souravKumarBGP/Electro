<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory;

    protected $guarded = ["_token", "remember_token", "role"];

    protected $hidden = ["password", "remember_token", "token", "role", "created_at", "updated_at"]; // Logic to side some feilds

    // Logic to crete mutator function
    public function setNameAttribute($column)
    {
        $this->attributes["name"] = ucwords(trim($column));
    }

    public function setEmailAttribute($column)
    {
        $this->attributes["email"] = strtolower(trim($column));
    }

    public function setPasswordAttribute($column)
    {
        $this->attributes["password"] = Hash::make($column);
    }

}
