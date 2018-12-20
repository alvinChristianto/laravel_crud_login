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
    public function successLogin(Request $request)
    {
        $data = $request->session()->has('name');
        Log::debug('data!!'.$data);
        return view('welcome'); 
    }
    public function getLogin()
    {

         return view('login.login');
    }
   
    public function postLogin(Request $request)
    {
        if(Session::has('name')){
            $data = $request->session()->all();
            dd($data);
            #$sessValue = $request->session()->flush();
            return redirect('/homepage');
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
                    Log::debug('--------------------------------log name -> '.$data->name);
                    Log::debug('--------------------------------log email -> '.$data->email);

                    #return redirect('success')->with('status', 'success login');
                    #session()->flash('success', $data->name); 
                    return redirect('/homepage');
                }else
                {
                    session()->flash('wrongPs', 'wrong password ! '); 
                    return \Redirect::back()->withInput();
                }
            }else{
                    session()->flash('noUser', 'no user matched with data inserted !, please register '); 
                    return \Redirect::back()->withInput();
            }
        }
    }
     public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/'); 
    }
}
