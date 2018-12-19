<?php

namespace App\Http\Controllers;


use App\blog;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;


class createController extends Controller
{
	public function createPost(Request $request)
    {
    	return view('post.create');
    }
    public function sendPost(Request $request)
    {

		$blog = new blog;

		$blog->judul = $request->judul;
		#dd($request->judul);
		$blog->subjudul = $request->subjudul;
		$blog->createby = $request->by;
		$blog->para1 = $request->para1;
		$blog->para2 = $request->para2;
		$blog->para3 = $request->para3;
		
		if(strlen($blog->judul) > 150){
			session()->flash('error_Judul',"judul terlalu panjang : " .strlen($blog->judul). " karakter"); 
    		return \Redirect::back()->withInput();
    	}else if (strlen($blog->subjudul) > 150){
			session()->flash('error_Subjudul',"subjudul terlalu panjang : " .strlen($blog->subjudul). " karakter"); 
    		return \Redirect::back()->withInput();	
    	}else if (strlen($blog->createby) > 150){
			session()->flash('error_by',"nama penulis terlalu panjang : " .strlen($blog->createby). " karakter"); 
    		return \Redirect::back()->withInput();	
		}else if (strlen($blog->para1) > 1000){
			session()->flash('error_Para1',"paragrap terlalu panjang : " .strlen($blog->para1). " karakter"); 
    		return \Redirect::back()->withInput();	
    	    	

    	}else{
		
			$blog->save();
			session()->flash('success', 'You have Successfully Registered'); 
    		dd($blog->save());
    		return redirect('/homepage');
			
		}

	

    }
 
}

