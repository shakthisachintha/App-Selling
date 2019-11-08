<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App_Plans;

class AppRequestController extends Controller
{
    public function index(){
        $plans=App_Plans::All();
        return view('user.appreq',["plans"=>$plans]);
    }

    public function create($id){
        $plan=App_Plans::findOrFail($id);
        return view('user.creatnewapp',["plan"=>$plan]);
    }
}
