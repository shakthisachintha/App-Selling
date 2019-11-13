<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function appPlans()
    {
        return $this->belongsToMany('App\App_Plans')->orderBy('position','asc');
    }
}
