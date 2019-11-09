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

    public function allPurchases(){
        
    }

    public function orders(){
        
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
          'mobile_number' => \Auth::getUser()->telephone,
          'email' => \Auth::getUser()->email,
          'amount' => $plan->price,
          'callback_url' =>route('payComplete',[$order_id,\Auth::getUser()->id])
        ]);
        return $payment->receive();
    }

    public function payComplete($trans_id,$user_id,Request $request){
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("orders@apdue.com", "Notification");
        $email->setSubject("New Order");
        $email->addTo("shakthisachintha@gmail.com", "Shakthi Sachintha");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid(getenv(env("SENDGRID_KEY")));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }

    public function saveAppInfo(Request $request){
        $order=Order::where('orderId',$request->orderId)->first();
        if($order){
            echo "true";
            $order->orderId=$request->orderId;
            $order->appName=$request->appname;
            $order->packageName=$request->packagename;
            $order->appVersion=$request->appversion;
            $order->privacy=$request->privacy;
            $order->adminLink=$request->adminpanellink;
            $order->appPlan=$request->plan;
            $order->save();
            echo ($order->id);
        }else{
            $order=new Order;
            $order->orderId=$request->orderId;
            $order->appName=$request->appname;
            $order->packageName=$request->packagename;
            $order->user=\Auth::getUser()->id;
            $order->appVersion=$request->appversion;
            $order->privacy=$request->privacy;
            $order->adminLink=$request->adminpanellink;
            $order->appPlan=$request->plan;
            $order->save();
            echo ($order->id);
        }
        print_r($request->all());
    }

    public function saveAddInfo(Request $request){
        print_r($request->all());
        $order=Order::where('orderId',$request->orderId)->first();
        if($order){
            $order->admobBanner=$request->admobbanner;
            $order->admobInter=$request->admobinter;
            $order->admobNative=$request->admobnative;
            $order->facebookBanner=$request->fbbanner;
            $order->facebookInter=$request->fbinter;
            $order->facebookNative=$request->fbnative;
            $order->facebookNativeBanner=$request->fbnativebanner;
            $order->save();
            echo ($order->id);
        }else{
            $order=new Order;
            $order->orderId=$request->orderId;
            $order->appPlan=$request->plan;
            $order->user=\Auth::getUser()->id;
            $order->appName="Test App";
            $order->admobBanner=$request->admobbanner;
            $order->admobInter=$request->admobinter;
            $order->admobNative=$request->admobnative;
            $order->facebookBanner=$request->fbbanner;
            $order->facebookInter=$request->fbinter;
            $order->facebookNative=$request->fbnative;
            $order->facebookNativeBanner=$request->fbnativebanner;
            $order->save();
            echo($order->id);
        }
    }
}
