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

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class createController extends Controller
{
	public function createPost(Request $request)
    {
    	if(Session::has('Session_email')){    
       		Log::channel('log_app')->info('OpenPage: Create >> '.Session::get('Session_email').'|');
            return view('post.create');
        }else{
        	return redirect('/'); 
    	}
    	
    }
    public function sendPost(Request $request)
    {	
    	if(Session::has('Session_email')){    
	       	Log::channel('log_app')->info('Create: Create post input >> '.$request->judul.'|'.$request->subjudul.'|'.$request->by.'|'.$request->para1.'|'.$request->para2.'|'.$request->para3.'|');
	        

			function getIdPost(){
				$post = 'post'.'_';
				return uniqid($post);
			};
			$blog = new blog;
	
				
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
	
				$blog->id = getIdPost();
				$blog->judul = $request->judul;
				$blog->subjudul = $request->subjudul;
				$blog->createby = $request->by;
				$blog->para1 = $request->para1;
				$blog->para2 = $request->para2;
				$blog->para3 = $request->para3;
	
				$blog->save();

				Log::channel('log_app')->info('Create: Create post saved >> '.$blog->id.'|'.$blog->judul.'|'.$blog->subjudul.'|'.$request->createby.'|'.$request->para1.'|'.$request->para2.'|'.$request->para3.'|');
				session()->flash('success', 'your post have been saved !'); 
	    		#dd($blog->save());
	    		return redirect('/list_post');
				
			}
	    }
	}
    public function list_post()
    {	
        
    	if(Session::has('Session_email') && Session::has('Session_role_admin')){
        	$listpost = DB::table('createBlog')
						->orderBy('created_at','DESC')
						->get();

			Log::channel('log_app')->info('OpenPage: List post >> '.Session::get('Session_email').'|'.Session::get('Session_role_admin').'|'.count($listpost).'|');

			if(count($listpost) > 0 ){
				return view('post.list_post', ['listpost' => $listpost]);
			}else{
				session()->flash('nodata',"no data found");
				return view('post.list_post');
	       	}
		}
		elseif(Session::has('Session_email') && Session::has('Session_role_user')){
			$listpost = DB::table('createBlog')
						->where('createby','=',Session::get('Session_username'))
						->orderBy('created_at','DESC')
						->get();
			Log::channel('log_app')->info('OpenPage: List post >> '.Session::get('Session_email').'|'.Session::get('Session_role_user').'|'.count($listpost).'|');
				
			if(count($listpost) > 0 ){
				return view('post.list_post', ['listpost' => $listpost]);
			}else{
				session()->flash('nodata',"no data found");
				return view('post.list_post');
	       	}
	    }else{
        	return redirect('401'); 
    	}
		
    }

    public function preview($id)
    {
    	if(Session::has('Session_email')){
        	$prev = blog::find($id);
	    	$prevpost = DB::table('createBlog')->where('id', $id)->first();

	    	Log::channel('log_app')->info('OpenPage: Preview >> '.$prevpost->id.'|'.$prevpost->judul.'|');

    		return view('post.preview', ['prevpost'=>$prevpost]);
        }else{
        	return redirect('401'); 
    	}
    	
    }
 
 	public function edit($id)
 	{
 		if(Session::has('Session_email')){ 	
	 		$editblog = DB::table('createBlog')->where('id', $id)
	 					->first();
	 		Log::channel('log_app')->info('OpenPage: edit post >> '.$editblog->id.'|'.$editblog->judul.'|');
 
	 		return view('post.edit', ['editblog'=>$editblog]);

        }else{
        	return redirect('401'); 
    	}
	}

	public function edit_post($id, Request $request)
 	{	
 		if(Session::has('Session_email')){ 	

	 		DB::table('createBlog')
		            ->where('id', $id)
	    	        ->update(['judul' => $request->judul, 
	    	        		 'subjudul' => $request->subjudul,
	    	        		 'createby' => $request->by,
	    	        		 'para1' => $request->para1,
	    	        		 'para2' => $request->para2,
	    	        		 'para3' => $request->para3]);

		 	$listpost = DB::table('createBlog')
							->orderBy('created_at','DESC')
							->get();
		 	session()->flash('success', 'your post have been Edit !'); 
		    		#dd($blog->save());
		    return redirect('/list_post');
        }else{
        	return redirect('401'); 
    	}

 	}

 	public function delete($id)
 	{
 		DB::table('createBlog')->where('id', '=', $id)->delete();

		session()->flash('success', 'your post have been Delete !'); 
	    return redirect('/list_post');
 	}

}

