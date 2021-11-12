<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

use Mail;

class HomeController extends Controller
{
    
    public function index()
    {
        $project_data = view('welcome')->with('project_data',Project::paginate(3));
        
        return $project_data ;

     }

     public function store(Request $request)
     {
        $this->validate(request(),[
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $data = request()-> all();
        \Mail::send('email', array(
            'firstName' => $request->get('firstName'),
            'lastName' => $request->get('lastName'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'messages' => $request->message
        ), function($message) use ($request){
            $message->to('info@gihangacoffee.com', 'Gihanga Coffee')->subject($request->get('subject'));
        });
        session()->flash('success','Email sent successfully');
        
        return back()->with('success', 'Thanks for contacting us.');
     }
}
