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
    public function successLogin()
    {
        return view('homepage');
    }
    public function getLogin()
    {
    	return view('login.login');
    }
   
    public function postLogin(Request $request)
    {
        if(Session::has('name')){
            #$sessValue = $request->session()->flush();
            dd($sessValue);
            return 'already logins';
        }else{
            $email = $request->inputEmailUser;
            $pass = $request->password;
            $data = User::where ('email', $email)->first();
            dd($data->password);
            if(count($data) > 0){
                if(Hash::check($pass, $data->password)){
                    #Session::put('name', $data->name);
                    #Session::put('email', $data->email);
                    #Session::put('login', TRUE);
                    #return redirect('success')->with('status', 'success login');
                    return view('homepage');
                }else
                {
                    return 'salah password!';
                }
            }else{
                return 'tidak ada account';
            }
        }
    }
     public function logout(Request $request)
    {
        $request->session()->flush();
    }
}
