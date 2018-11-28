<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    /*public function categoryDetails()
    {
        return $this->belongsTO('App\Categories','category_id');
    } */
     public function getNameAttribute($value) {
        return ucwords($value);
     }
     public function categoryDetails()
    {
        return $this->hasMany('App\Categories','product_id');
    }
}
