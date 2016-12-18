<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'carts';

    protected $fillable = array('client_id','product_id','amount','total');

    public function Books(){

        return $this->belongsTo('Product','product_id');

    }
}