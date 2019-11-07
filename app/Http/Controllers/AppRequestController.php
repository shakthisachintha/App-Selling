<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppRequestController extends Controller
{
    public function index(){
        return view('user.appreq');
    }
}
