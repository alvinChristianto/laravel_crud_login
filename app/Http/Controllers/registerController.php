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
		
		$user->save();
		session()->flash('success', 'You have Successfully Registered'); 
    	return redirect('/login');

		#dd("username " );
	}
}
