<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\App_Plans;
use PaytmWallet;
use App\Order;
use App\Transaction;

class AppRequestController extends Controller
{
    public function index(){
        $plans=App_Plans::All();
        $cats=\DB::table('app__plans_category')->select('category_id')->distinct()->get(['category_id']);
        $str="";
        if($cats->isEmpty()){
            $str="0";
        }
        foreach ($cats as $cat) {
            $str.=$cat->category_id.",";
        }
        $str = rtrim($str, ",");
        $cats=\DB::select("select * from categories where id in($str) order by position asc");
        return view('user.appreq',["plans"=>$plans,"cats"=>$cats]);
    }
// select * from categories where id in(1,2,3,4) order by position asc;
    public function saveAppInfoTwo(Request $request){
        $order=Order::find($request->orderId);
        if($order){
            $order->appName=$request->appname;
            $order->packageName=$request->packagename;
            $order->appVersion=$request->appversion;
            $order->privacy=$request->privacy;
            if($request->file('applogo')){
                $path = $request->file('applogo')->store('public/applogos');
                $order->appLogo=$path;
            }
            $order->save();
            return redirect()->back();
        }
    }
    public function saveAddInfoTwo(Request $request){
        $order=Order::find($request->orderId);
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
            return redirect()->back();
        }
    }

    public function regenerate(Request $request){
        $order=Order::findOrFail($request->order);
        $order->revision="YES";
        $order->save();
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("revisions@apdue.com", "App Regenerate Request");
        $email->setSubject("Apdue New Order");
        $email->addTo("sandeepolamail@gmail.com", "Sandeep");
        $email->addContent("text/plain", "App Regeneration Request Order($order->orderId");
        $email->addContent(
            "text/html", 
            "<center>
                <h3>App Regeneration</h3>
                <p>Order Number $order->number</p>
                <p>Date $order->updated_at</p>
            </center>"
        );
        $sendgrid = new \SendGrid(env("SENDGRID_KEY"));
        try {
            $response = $sendgrid->send($email);
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        return redirect()->back();
    }

    public function allPurchases(){
        $orders=Order::where('user_id',\Auth::getUser()->id)->orderBy('updated_at','desc')->where('payment',"YES")->get();
        return view('user.allaps',["apps"=>$orders,"title"=>"All Purchased Applications"]);
    }

    public function payOtherHalf(Request $request){
        $order_id=$request->orderId+1;
        $plan_id=$request->plan;
        $plan=App_Plans::find($plan_id);
        
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $order_id,
          'user' => \Auth::getUser()->id,
          'mobile_number' => \Auth::getUser()->telephone,
          'email' => \Auth::getUser()->email,
          'amount' => $plan->hprice,
          'callback_url' =>route('payComplete',[$order_id-1,'ah',\Auth::getUser()->id])
        ]);
        return $payment->receive();
    }

    

    public function response(Request $request){
        $order=Order::find($request->order);
        $order->username=$request->username;
        $order->password=$request->password;
        $order->custommsg=$request->custommessage;
        $order->adminLink =$request->adminlink;
        $order->guidevideo  =$request->guidevideo ;
        
        if($request->file('apk')){
            $path = $request->file('apk')->storeAs('public/apk',$request->file('apk')->getClientOriginalName());
            $order->apk=$path;
        }
        if($request->file('source')){
            $path = $request->file('source')->storeAs('public/source',$request->file('source')->getClientOriginalName());
            $order->sourceCode=$path;
        }
        if($request->file('keystore')){
            $path = $request->file('keystore')->storeAs('public/keystore',$request->file('keystore')->getClientOriginalName());
            $order->keystore=$path;
        }

        $order->delivered="YES";
        $order->revision="NO";
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
        $orders=Order::where('payment',"YES")->where('delivered',"NO")->orderBy('updated_at', 'desc')->get();
        $orders_total=Order::where('payment',"YES")->count();
        $areq=Order::where('payment',"YES")->orderBy('updated_at', 'desc')->get();
        $new=Order::where('delivered',"NO")->where('payment','YES')->count();
        $count=Order::where('payment','YES')->sum('amount');
        $this_month=\DB::table('orders')->select('id')->whereRaw("MONTH(created_at)=MONTH(CURDATE())")->where('payment',"YES")->count();
        $revision=Order::where('payment',"YES")->where('paymentType',"FULL")->where("revision","YES")->get();
        return view('admin.requests',["norders"=>$orders,"revisions"=>$revision,"arequests"=>$areq,"this_month"=>$this_month,"total_orders"=>$orders_total,"new_orders"=>$new,"total"=>$count]);
    }

    public function create($id){
        $plan=App_Plans::findOrFail($id);
        return view('user.creatnewapp',["plan"=>$plan,"orderId"=>rand(11111,99999)]);
    }

    public function display(){
        $orders=Order::where('user_id',\Auth::getUser()->id)->orderBy('updated_at','desc')->get();
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
          'callback_url' =>route('payComplete',[$order_id,'f',\Auth::getUser()->id])
        ]);
        return $payment->receive();
    }

    public function makeHalfPayment(Request $request){
        $order_id=$request->orderId;
        $plan_id=$request->plan;
        $plan=App_Plans::find($plan_id);
        
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $order_id,
          'user' => \Auth::getUser()->id,
          'mobile_number' => \Auth::getUser()->telephone,
          'email' => \Auth::getUser()->email,
          'amount' => $plan->hprice,
          'callback_url' =>route('payComplete',[$order_id,'h',\Auth::getUser()->id])
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


    public function notify($to_email="sandeepolamail@gmail.com",$to_name,$from,$amount,$date,$mode){
        if($mode=='h'){
            $mode='HALF';
        }
        if($mode=='f'){
            $mode='FULL';
        }
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("orders@apdue.com", "New AppDue Order");
        $email->setSubject("Apdue New Order");
        $email->addTo("$to_email", "$to_name");
        $email->addContent("text/plain", "New Order Received From $from.");
        $email->addContent(
            "text/html", 
            "<center>
                <h3>New Order</h3>
                <p>New Order From $from</p>
                <p>Total Amount ₹ $amount</p>
                <p>($mode Payment)</p>
                <p>Date $date</p>
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

    public function payComplete($trans_id,$pay_type,$user_id,Request $request){
        $order=Order::where('orderId',$trans_id)->first();
        if($order){
            $transction=new Transaction();
            $transction->txnid=$request->TXNID;
            $transction->amount=$request->TXNAMOUNT;
            $transction->pay_method=$request->PAYMENTMODE;
            $transction->status=$request->STATUS;
            $transction->resp_code=$request->RESPCODE;
            $transction->resp_msg=$request->RESPMSG;
            $transction->order_id=$order->id;
            $transction->save();

            if($request->RESPCODE!=1 && $pay_type!="ah"){ //transaction failed
                $order->payment="NO";
                $order->save();
                return redirect()->route('allaps')->with('payFail',$request->RESPMSG);
            }else{  //transaction success
                $order->payment="YES";
                if($pay_type=='h'){
                    $order->paymentType="HALF";
                    $order->amount=App_Plans::find($order->app_plan_id)->hprice;
                }else if($pay_type=='f'){
                    $order->paymentType="FULL";
                    $order->amount=App_Plans::find($order->app_plan_id)->price;
                }else if($pay_type=='ah'){
                    $order->paymentType="FULL";
                    $order->amount+=App_Plans::find($order->app_plan_id)->hprice;
                }
                $order->save();
                $this->notify("sandeepolamail@gmail.com","Sandeep",\Auth::getUser()->name,$order->amount,$order->updated_at,$pay_type);
                $this->notify("shakthisachintha@gmail.com","Sandeep",\Auth::getUser()->name,$order->amount,$order->updated_at,$pay_type);
                return redirect()->route('apppurch')->with('payDone',"Payment Received. Your App Is Being Generated!");
            }
        }
        return redirect()->route('allaps');
    }

    public function viewOrder($id){
        $order=Order::findOrFail($id);
        $order->viewed="YES";
        $order->save();
        $plan=App_Plans::find($order->app_plan_id);
        return view('user.viewapp',["order"=>$order,"plan"=>$plan,"orderId"=>$order->orderId]);
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
