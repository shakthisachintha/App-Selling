<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function appPlan()
    {
        return $this->hasOne('App\App_Plans');
    }
}
