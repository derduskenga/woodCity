<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';

    protected $fillable = array('client_id','address_id','total');

    public function orderItems()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity','total');
    }

    public function address()
    {
        return $this->belongsTo('App\Address');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function status()
    {
        return $this->hasOne('App\Status');
    }

}
