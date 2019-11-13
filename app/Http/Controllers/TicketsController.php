<?php

namespace App\Http\Controllers;

use App\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index(){
        $tickets=Tickets::orderBy('created_at','DESC')->get();
        return view('admin.tickets',["tickets"=>$tickets]);
    }

    public function answer($id){
        $ticket=Tickets::findOrFail($id);
        return view('admin.ticket_answer',["ticket"=>$ticket]);
    }

    public function answerSave(Request $request){
        $ticket=Tickets::findOrFail($request->id);
        $ticket->answered="YES";
        
    }
}
