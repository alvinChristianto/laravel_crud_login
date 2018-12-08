<?php

namespace App\Http\Controllers;

use App\User;
use App\roleModel;
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


		$user = new User;
		$user->role_id = DB::table('roles')
							->select('id')
							->where('namaRole','Pengguna')
							->first()
							->id;
		$user->username = $request->username;
		$user->name = $request->name;
		$user->email = $request->email;
		#$user->password = encrypt(Input::get('password'));
		$user->password = Hash::make($request->password);
		
		#dd($request->password);
		if(Hash::check($request->password, $user->password)){
			Log::info('input '.$request->password);
			Log::info('hash '.$user->password);	
			Log::info('cucok ');
		}
		else{
			Log::info('input |'.$request->password);
			Log::info('hash |'.$user->password.'| hash');	
			Log::info('not cucok');	
		}
		$user->save();
		error_log("message 11");
		
   		return view('login.login');

		#dd("username " );
	}
}
