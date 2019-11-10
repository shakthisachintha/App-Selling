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
        $orders=Order::where('user_id',\Auth::getUser()->id)->where('payment',"YES")->get();
        return view('user.allaps',["apps"=>$orders,"title"=>"All Purchased Applications"]);
    }

    public function response(Request $request){
        $order=Order::find($request->order);
        $order->username=$request->username;
        $order->password=$request->password;
        $order->custommsg=$request->custommessage;
        $order->adminLink =$request->adminlink;
        $order->guidevideo  =$request->guidevideo ;
        
        if($request->file('apk')){
            $path = $request->file('apk')->store('public/apk');
            $order->apk=$path;
        }
        if($request->file('source')){
            $path = $request->file('source')->store('public/source');
            $order->sourceCode=$path;
        }
        if($request->file('keystore')){
            $path = $request->file('keystore')->store('public/keystore');
            $order->keystore=$path;
        }

        $order->delivered="YES";
        $order->save();
        return redirect()->back()->with('success',"Order Delivered");
    }

    public function viewReq($id){
        $order=Order::findOrFail($id);
        $order->responded="YES";
        $order->viewed="NO";
        $order->save();
        return view('admin.view_request',["order"=>$order]);
    }

    public function orders(){
        $orders=Order::where('payment',"YES")->get();
        $orders_total=Order::where('payment',"YES")->count();
        $new=Order::where('delivered',"NO")->where('payment','YES')->count();
        $count=Order::where('payment','YES')->count('amount');
        $this_month=\DB::table('orders')->select('id')->whereRaw("MONTH(created_at)=MONTH(CURDATE())")->count();
        return view('admin.requests',["orders"=>$orders,"this_month"=>$this_month,"total_orders"=>$orders_total,"new_orders"=>$new,"total"=>$count]);
    }

    public function create($id){
        $plan=App_Plans::findOrFail($id);
        return view('user.creatnewapp',["plan"=>$plan,"orderId"=>rand(11111,99999)]);
    }

    public function display(){
        $orders=Order::where('user_id',\Auth::getUser()->id)->get();
        return view('user.allaps',["apps"=>$orders,"title"=>"All Applications"]);
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

    public function download($file,$id){
        $order=Order::findOrFail($id);
        if($order->apk && $file=="apk"){
            return \Storage::download($order->apk);
            return redirect()->back();
        }
        else if($order->keyStore && $file=="keystore"){
            return \Storage::download($order->keyStore);
            return redirect()->back();
        }
        else if($order->sourceCode && $file=="source"){
             return \Storage::download($order->sourceCode);
             return redirect()->back();
        }else{
            return redirect()->back(404);
        }
    }


    public function notify($to_email="sandeepolamail@gmail.com",$to_name,$from,$amount,$date){
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("orders@apdue.com", "Notification");
        $email->setSubject("Apdue New Order");
        $email->addTo("$to_email", "$to_name");
        $email->addContent("text/plain", "New Order Received From $from.");
        $email->addContent(
            "text/html", 
            "<center>
                <h3>New Order</h3>
                <p>New Order From $from</p>
                <p>Total Amount ₹ $amount</p>
                <p>Date ₹ $date</p>
            </center>"
        );
        $sendgrid = new \SendGrid(env("SENDGRID_KEY"));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }

    public function payComplete($trans_id,$user_id,Request $request){
        $order=Order::where('orderId',$trans_id)->first();
        if($order){
            // dd($order->appPlan());
            $order->payment="YES";
            $order->amount=App_Plans::find($order->app_plan_id)->price;
            $order->save();
            $this->notify("shakthisachintha@gmail.com","Sandeep",\Auth::getUser()->name,$order->amount,$order->updated_at);
            return redirect()->route('apppurch');
        }
    }

    public function viewOrder($id){
        $order=Order::findOrFail($id);
        $order->viewed="YES";
        $order->save();
        $plan=App_Plans::find($order->app_plan_id);
        return view('user.viewapp',["order"=>$order,"plan"=>$plan]);
    }

    public function delOrder($id){
        Order::find($id)->delete();
        return redirect()->back();
    }


    public function saveAppInfo(Request $request){
        $order=Order::where('orderId',$request->orderId)->first();
        if($order){
            $order->orderId=$request->orderId;
            $order->appName=$request->appname;
            $order->packageName=$request->packagename;
            $order->appVersion=$request->appversion;
            $order->privacy=$request->privacy;
            $order->appPlan=$request->plan;
            $order->save();
            echo ($order->id);
        }else{
            $order=new Order;
            $order->orderId=$request->orderId;
            $order->appName=$request->appname;
            $order->packageName=$request->packagename;
            $order->user_id=\Auth::getUser()->id;
            $order->appVersion=$request->appversion;
            $order->privacy=$request->privacy;
            $order->app_plan_id=$request->plan;

            if($request->file('applogo')){
                $path = $request->file('applogo')->store('public/applogos');
                // return \Storage::download($path);
                // $url = \Storage::url($path);
                $order->appLogo=$path;
            }
           
            $order->save();
            echo ($order->id);
            
        }
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
            $order->fbintraftclck=$request->fbintraftclck;
            $order->admobintraftclck=$request->admobintraftclck;
            $order->save();
            echo ($order->id);
        }else{
            $order=new Order;
            $order->orderId=$request->orderId;
            $order->app_plan_id=$request->plan;
            $order->user_id=\Auth::getUser()->id;
            $order->appName="Test App";
            $order->admobBanner=$request->admobbanner;
            $order->admobInter=$request->admobinter;
            $order->admobNative=$request->admobnative;
            $order->facebookBanner=$request->fbbanner;
            $order->facebookInter=$request->fbinter;
            $order->facebookNative=$request->fbnative;
            $order->facebookNativeBanner=$request->fbnativebanner;
            $order->fbintraftclck=$request->fbintraftclck;
            $order->admobintraftclck=$request->admobintraftclck;
            $order->save();
            echo($order->id);
        }
    }
}
