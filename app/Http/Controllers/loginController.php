<?php

namespace App\Http\Controllers;


// use App\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function getLogin()
    {
    	return view('login.login');
    }
    public function postLogin(Request $request)
    {
    	if(Auth::attempt([
    		'email' => $request->inputEmailUser,
    		'password' => $request->password
    	]))
    	{
    		return redirect('/');
    	}else
    	{
    		return 'salah masukkan data !';
    	}
  
    }
}
