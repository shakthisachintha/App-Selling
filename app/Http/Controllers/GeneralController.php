<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function upComming(){

    }

    public function help(){
        return view('general.help');
    }

    public function contact(){
        return view('general.contact');
    }

}
