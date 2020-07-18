<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drink extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function type(){
        return $this->belongsTo(DrinkType::class, 'drink_type_id');
    }
    
    public function transactionHeader()
    {
        return $this->hasMany(TransactionHeader::class);
    }
}
