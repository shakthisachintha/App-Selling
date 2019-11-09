<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function appPlan()
    {
        return $this->hasOne('App\App_Plans');
    }
}
