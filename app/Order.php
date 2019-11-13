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
        return $this->belongsTo('App\App_Plans');
    }
}
