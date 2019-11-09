<?php

namespace App\Http\Controllers;

use App\App_Plans;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_users=User::count();
        $total_orders=Order::count();
        $happy=Order::where("payment","YES")->count();
        $apps=App_Plans::count();
        return view('dash',["total_users"=>$total_users,"happy_customers"=>$happy,"total_orders"=>$total_orders,"app_plans"=>$apps]);
    }
}
