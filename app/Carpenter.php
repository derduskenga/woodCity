<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carpenter extends Model
{
    //

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
