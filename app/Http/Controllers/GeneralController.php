<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class GeneralController extends Controller
{
    public function upComming(){
        return view('general.upcomming');
    }

    public function help(){
        return view('general.help');
    }

    public function contact(){
        return view('general.contact');
    }

    public function users(){
        return view('admin.allusers',["apps"=>User::all()]);
    }

}
