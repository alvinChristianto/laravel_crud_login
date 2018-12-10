<?php

namespace App\Http\Controllers;

use App\User;
// use App\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class loginController extends Controller
{   
    public function successLogin()
    {
        return view('homepage');
    }
    public function getLogin()
    {
        if(Session::has('name')){
            return redirect('/homepage');
        }else{
    	   return view('login.login');
        }
    }
   
    public function postLogin(Request $request)
    {
        if(Session::has('name')){
            #$sessValue = $request->session()->flush();
            return 'already logins';
        }else{
            $email = $request->inputEmailUser;
            $pass = $request->password;
            $data = User::where ('email', $email)->first();
            #dd($data);
            if(count($data) > 0){
                Log::info('passinput '.$pass);
                Log::info('hash |'.$data->password.'| hash');
                if(Hash::check($pass, $data->password)){
                    Session::put('name', $data->name);
                    Session::put('email', $data->email);
                    Session::put('login', TRUE);
                    #return redirect('success')->with('status', 'success login');
                    session()->flash('success', $data->name); 
                    return redirect('/homepage');
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
        return view('login.login');
    }
}
