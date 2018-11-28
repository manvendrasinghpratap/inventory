<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function invoiceDetails()
    {
        return $this->hasMany('App\InvoiceDetail','invoice','invoice');
    }
}
