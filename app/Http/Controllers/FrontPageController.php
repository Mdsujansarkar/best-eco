<?php

namespace App\Http\Controllers;
use App\Register;
use App\User;
use Session;
use Illuminate\Http\Request;
use Auth;

class FrontPageController extends Controller
{
    public function index()
    {
    	return view('frontend.home.login');
    }
    public function register()
    {
    	return view('frontend.home.register');
    }
    public function home()
    {
    	return view('frontend.home.home');
    }
    public function process(Request $request)
    {
    	$this->validate($request,[
    		'full_name'		=> 'required|min:3|max:50',
    		'email'			=> 'required|email',
    		'phone_number'	=> 'required|max:13',
    		'password'		=> 'required|confirmed|min:6'
    	]);
    	$data = [
    		'full_name'				=>$request->input('full_name'),
    		'email'					=>strtolower($request->input('email')),
    		'phone_number'			=>$request->input('phone_number'),
    		'password'				=>bcrypt($request->input('password'))
    	];

    	try{
    		User::create($data);
    		session::flash('message','user account creat');
    		session::flash('type','sucess');
    		return redirect('/login');
    	}catch(\Exception $e){
    		session::flash('message', $e->getMessage());
    		session::flash('type','danger');
    		return redirect()->back();
    	}
    }
    public function loginProcess(Request $request)
    {
    	$this->validate($request,[
    	
    		'email'			=> 'required|email',
    		'password'		=> 'required|min:6'
    	]);

    	$attributes = $request->except(['_token']);
    	if (Auth::attempt($attributes)) {
        return redirect()->route('home');
        }
    	session::flash('message', 'Invalide user name or password');
    	session::flash('type','danger');
    	return redirect()->back();
    }
}
