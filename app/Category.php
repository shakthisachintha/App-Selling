<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function appPlans()
    {
        return $this->hasMany('App\App_Plans');
    }

}
