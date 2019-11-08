<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App_Plans;
use PaytmWallet;

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

    public function makePayment($id,Request $request){
    
          $input = $request->all();
          $input['order_id'] = rand(1111,9999);
          $input['amount'] = 50;
   
          $payment = PaytmWallet::with('receive');
          $payment->prepare([
            'order' => $input['order_id'],
            'user' => '19970625',
            'mobile_number' => '+917735988342',
            'email' => "shakthisachintha@gmail.com",
            'amount' => $input['amount'],
            'callback_url' => url('payment/status')
          ]);
          return $payment->receive();
    }
}
