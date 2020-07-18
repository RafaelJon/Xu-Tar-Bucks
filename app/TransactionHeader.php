<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function drink(){
        return $this->belongsTo(Drink::class, 'drink_id')->withTrashed();
    }

    public function topping(){
        return $this->belongsToMany(Topping::class, 'transaction_details')->withTrashed();
    }

    public function size(){
        return $this->belongsTo(SizeType::class, 'size_id');
    }

    public function sugar(){
        return $this->belongsTo(SugarType::class, 'sugar_id');
    }

    public function ice(){
        return $this->belongsTo(IceType::class, 'ice_id');
    }
}
