<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Product extends Model implements TaggableInterface
{
    use TaggableTrait;

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
