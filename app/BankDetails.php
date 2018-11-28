<?php namespace App;
use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model{

	protected $table = 'bank_details';   
     public function getBankNameAttribute($value) {
        return ucwords($value);
     }

}