<?php

namespace App\Http\Controllers;

use App\User;
use App\roleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
class registerController extends Controller
{
	public function getRegister()
	{
		return view('register.register');
	}
	public function postRegister(Request $request)
	{


		$user = new User;
		$user->role_id = 1;
		$user->username = $request->username;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = encrypt(Input::get('password'));
		// $user->role_id = DB::table('roles')->select('id')->where('namaRole','Pengguna')->first();
		
		

		$user->save();
		Route::get('/', function () { 
			return redirect('welcome')->with('status', 'Data Inserted!');
		
		});
		#dd("username " );
	}
}
