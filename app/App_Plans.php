<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App_Plans extends Model
{
    //

    public function category(){
        return $this->hasOne('App\Category');
    }

}
