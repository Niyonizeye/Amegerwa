<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\Project;

use Alert;

class adminController extends Controller
{   
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
        if(Auth::user()->userable_type=="SuperAdmin" ){

            return view('admin.addphoto');
        }
        else{
            return redirect('/');
        }
    }
    public function store(Request $request)
    { 
       $this->validate(request(),[
            'url' => 'required',
            'caption' => 'required'
        ]);

        // dd($request->post())

        $data = request()-> all();
        $image=$request->file('url');
        $re_image=time().'.'.$image->getClientOriginalExtension();
        $dest=public_path('/img');
        $image->move($dest,$re_image);
        $project = new Project();
        $project->url = $re_image;
        $project->caption = $data['caption'];
        $project->save();        
        
        Alert::success('Congrats', 'You\'ve Created project successfully'); 

        return redirect()->back();
    }
    
}
