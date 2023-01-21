<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{

    use HasFactory,HasApiTokens;

    protected $guarded = ['id'];
    protected $hidden = ['password'];


    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = Hash::make($password);
        }
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'customer_product');
    }



}
