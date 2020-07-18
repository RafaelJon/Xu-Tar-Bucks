<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrinkType extends Model
{
    //
    public function drink()
    {
        return $this->hasMany(Drink::class);
    }
}
