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
        return $this->belongsToMany('Book') ->withPivot('amount','total');
    }

    public function address()
    {
        return $this->hasOne('App\Address');
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
