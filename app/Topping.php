<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topping extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function transactionHeader()
    {
        return $this->belongsToMany(TransactionHeader::class, 'transaction_details');
    }
}
