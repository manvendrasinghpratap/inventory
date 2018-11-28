<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
   
    public function getNameAttribute($value) {
        return ucwords($value);
    }
    public function productDetails()
    {
        return $this->hasOne('App\Product','id','product_id');
    }
    
}
