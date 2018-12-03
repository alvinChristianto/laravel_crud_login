<?php

namespace App\Http\Controllers;

use App\User;
// use App\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function getLogin()
    {
    	return view('login.login');
    }
    public function postLogin(Request $request)
    {
        $email = $request->inputEmailUser;
        $pass = $request->password;
    	$data = User::where ('email', $email)->first();
        #if(Auth::attempt([
    	#	'email' => $request->inputEmailUser,
    	#	'password' => $request->password
    	#]))
        if(count($data) > 0){
            if(Hash::check($pass, $data->password)){
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('login', TRUE);
    		#return redirect('/');
                return 'data benar !';
        	}else
        	{
        		return 'salah masukkan data !';
        	}
        }
    }
}
