<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

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
        return redirect('/');
    }
    
    //show.phpへ
    public function show(){
        $user = Auth::user();
        return view('user/show',['user' => $user]);
    }
    
    //edit.phpへ
    public function edit(){
        $auth = Auth::user();
        return view('user/edit',['auth' => $auth]);
    }
    
    //update
    public function update(Request $request){
        $auth = Auth::user();
        $auth->name=$request->list_name;
        $auth->email=$request->list_email;
        $auth->password=Hash::make($request->password);
        $auth->save();
        return redirect('/');
    }
    
    public function confirm(){
        $auth = Auth::user();
        return view('user/comfirm',['auth' => $auth]);
    }
}
