<?php

namespace App\Http\Controllers;

use App\App_Plans;
use App\Order;
use App\Tickets;
use App\Upcomming;
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
        $all_apps=User::find(\Auth::getUser()->id)->order->count();
        $purchased_apps=Order::where("user_id",\Auth::getUser()->id)->where("payment","YES")->count();
        $upcomming=Upcomming::all()->count();
        $all_tickets=User::find(\Auth::getUser()->id)->tickets->count();
        return view('dash',["all_apps"=>$all_apps,"purchased_apps"=>$purchased_apps,"upcomming"=>$upcomming,"all_tickets"=>$all_tickets]);
    }
}
