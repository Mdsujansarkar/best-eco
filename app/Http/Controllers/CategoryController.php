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
    	$categories = Category::select('id','name','slug','status')->paginate(4);
    	
    	return view('backend.category.categoryManage',['categories'=>$categories]);
    }
    public function edit($id)
    {
    	$category       =  Category::find($id);
    	return view('backend.category.editCategory',['category' =>$category]);
    }

    public function update($id, Request $request)
    {
    	
         $v = Validator::make($request->all(), [
            'name'      => 'required',
            'status'    => 'required'
         ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        try{
            $category = Category::find($id);
             $category->update([
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

    public function inactive($id)
    {
        $category = Category::find($id);
        $category ->status = 0;
        $category->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $category = Category::find($id);
        $category ->status = 1;
        $category->save();
        return redirect()->back(); 
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category ->delete();
         session::flash('message', 'Data is delete');
         session::flash('type','danger');
        return redirect()->back();
    }
}
