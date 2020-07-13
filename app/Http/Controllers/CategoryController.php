<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use Session;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
    	return view('backend.category.category');
    }
    public function create(Request $request)
    {

    	 $v = Validator::make($request->all(), [
			'name' 		=> 'required',
        	'status' 	=> 'required'
		 ]);

	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors());
	    }

    	try{
    		 Category::create([
	    	'name' => trim($request->input('name')),
	    	'slug' => str_slug(trim($request->input('name'))),
	    	'status' => $request->input('status'),
	    ]);
	    session::flash('message', 'Category add');
    	session::flash('type','danger');
    	return redirect()->back();
    	}catch(\Exception $e){
    		session::flash('message', 'Your Data is duplicate');
    		session::flash('type','danger');
    		return redirect()->back()->withInput();
    	}

    }

    public function manage()
    {
    	$categories = Category::select('name','slug','status')->paginate(4);
    	
    	return view('backend.category.categoryManage',['categories'=>$categories]);
    }
}
