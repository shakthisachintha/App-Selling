<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App_Plans;
use PaytmWallet;
use App\Order;

class AppRequestController extends Controller
{
    public function index(){
        $plans=App_Plans::All();
        return view('user.appreq',["plans"=>$plans]);
    }

    public function create($id){
        $plan=App_Plans::findOrFail($id);
        return view('user.creatnewapp',["plan"=>$plan,"orderId"=>rand(11111,99999)]);
    }

    public function makePayment(Request $request){
        
        $order_id=$request->orderId;
        $plan_id=$request->plan;
        $plan=App_Plans::find($plan_id);
        
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $order_id,
          'user' => \Auth::getUser()->id,
          'mobile_number' => ' ',
          'email' => \Auth::getUser()->email,
          'amount' => $plan->price,
          'callback_url' =>route('payComplete',[$order_id,\Auth::getUser()->id])
        ]);
        return $payment->receive();
    }

    public function payComplete($trans_id,$user_id,Request $request){
        // dd($request->all());  
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("test@example.com", "Example User");
        $email->setSubject("Sending with SendGrid is Fun");
        $email->addTo("shakthisachintha@gmail.com", "Example User");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $apikey = env("SENDGRID_KEY", "somedefaultvalue");
        $sendgrid = new \SendGrid(getenv($apikey));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }  
    }
}
