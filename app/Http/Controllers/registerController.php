<?php

namespace App\Http\Controllers;

use App\User;
use App\roleModel;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class registerController extends Controller
{
	public function getRegister()
	{
		return view('register.register');
	}
	public function postRegister(Request $request)
	{        
		function getUniqueId(){
			$date = date('Ymd');
			$datenow = $date.'_';
			return uniqid($datenow);
		};

		$user = new User;
		$user->role_id = DB::table('roles')
							->select('id')
							->where('namaRole','Pengguna')
							->first()
							->id;
		$user->username = $request->username;
		$user->name = $request->name;
		$user->email = $request->email;
		Log::channel('log_app')->info('Try to Register >> '.$request->email.'|'.$request->name.'|'.$request->username.'|'.$request->password.'|');
		
		$dataEmailExist = User::where('email',$user->email)->first();
		$dataUsernameExist = User::where('username',$user->username)->first();
		#dd($dataUserAlready);
		if(count($dataEmailExist) > 0){
			Log::channel('log_app')->info('Try to Register >> already exist @'.$request->email);
			session()->flash('error',"already Registered : {$dataEmailExist->email}"); 
    		return \Redirect::back()->withInput();
    	}else if (count($dataUsernameExist) > 0 ){
			Log::channel('log_app')->info('Try to Register >> already exist @'.$request->username);
    		session()->flash('error',"already Registered : {$dataUsernameExist->username}"); 
    		return \Redirect::back()->withInput();	
    	}else{
			#$user->password = encrypt(Input::get('password'));
			$user->id = getUniqueId();
			$user->password = Hash::make($request->password);
			
			$user->save();
			#$user->id not displayed well
			Log::channel('log_app')->info('Register Success >> '.$user->id.'|'.$user->email.'|'.$user->name.'|hash pass> '.$user->password.'|'.$user->role_id.'|');
			session()->flash('success', 'You have Successfully Registered'); 
    		return redirect('/login');
	
		}

	}
}
