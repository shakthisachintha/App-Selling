<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use App\User;
use App\Upcomming;
class GeneralController extends Controller
{
    public function upComming(){
        return view('general.upcomming',["plans"=>Upcomming::all()]);
    }

    public function addFaq(Request $request){
        $faq=Faq::all();
        return view('admin.addfaq',["faqs"=>$faq]);
    }

    public function createFaq(Request $request){
        $faq=new Faq();
        $faq->question=$request->question;
        $faq->answer=$request->answer;
        $faq->save();
        return redirect()->back()->with('success',"FAQ($faq->id) Saved");
    }

    public function delFaq($id){
        $faq=Faq::find($id);
        $faq->forceDelete();
        return redirect()->route('addfaq')->with('success',"FAQ($id) Deleted!");
    }

    public function editFaq($id){
        $faq=Faq::find($id);
        return view('admin.editfaq',["faq"=>$faq]);
    }

    public function saveFaq(Request $request){
        $faq=Faq::find($request->id);
        $faq->question=$request->question;
        $faq->answer=$request->answer;
        $faq->save();
        return redirect()->back()->with('success',"FAQ($request->id) Saved");
    }

    public function help(){
        $faqs=Faq::all();
        return view('general.help',["faqs"=>$faqs]);
    }

    public function contact(){
        return view('general.contact');
    }

    public function users(){
        return view('admin.allusers',["apps"=>User::all()]);
    }

    public function contactMessage(Request $request){
        $from=$request->name;
        $subject=$request->subject;
        $message=$request->message;
        $file=$request->attach;

        


        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("help@apdue.com", "Help Me $from");
        $email->setSubject("Apdue Support Ticket");
        $email->addTo("sandeepolamail@gmail.com", "Sandeep");
        $email->addBcc("shakthisachintha@gmail.com","Shakthi");
        if($request->file('attach')){
            $path=$request->file('attach')->store('attach');
            $name=$request->file('attach')->getClientOriginalName();
            $file_encoded = base64_encode(file_get_contents($path));
            $email->addAttachment( 
            $file_encoded,
            "application/text",
            "$name",
            "attachment");
        }
        $email->addContent("text/plain", "New Contact Message From $from Subject $subject Message $message");
        $email->addContent(
            "text/html", 
            "<center>
                <h1>Name</h1>
                <p>$from</p>
                <h1>Subject</h1>
                <p>$subject</p>
                <h1>Message</h1>
                <p>$message</p>
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
        // return redirect()->back()->with("success","Your Support Ticket Has Been Submitted");
    }

}
