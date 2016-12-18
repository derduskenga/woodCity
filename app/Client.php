<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'clients';

    protected $fillable = ['f_name', 'l_name', 'phone_no', 'user_id'];


    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
