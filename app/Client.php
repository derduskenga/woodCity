<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'clients';

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
