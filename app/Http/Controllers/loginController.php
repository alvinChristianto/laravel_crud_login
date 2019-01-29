<?php

namespace App\Http\Controllers;

use App\User;
use DB;
// use App\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class loginController extends Controller
{   
    public function homepage()
    {
        return view('front');
    }
    public function successLogin(Request $request)
    {
        $data = $request->session()->has('Session_email');
        Log::debug('data!!'.$data);
        $listpost = DB::table('createBlog')
                    ->orderBy('created_at','DESC')
                    ->get();


        if(count($listpost) > 0 ){
            #dd($listpost);
            return view('front', ['listpost' => $listpost]);
        }else{
            session()->flash('nodata',"no data found");
                return view('front');
        }
    }
    public function getLogin()
    {
        if(Session::has('Session_email')){
            return view('welcome');
        }else{
            return view('login.login');
        }
    }
   
    public function postLogin(Request $request)
    {
        if(Session::has('Session_email')){
            $data = $request->session()->all();
            dd($data);
            #$sessValue = $request->session()->flush();
            return redirect('/homepage');
        }else{
            $emailAdd = $request->inputEmailUser;
            $pass = $request->password;

                    
            #get role_id of user
            $role_id = \DB::table('users')
                     ->select ('role_id')
                     ->where('email','=', $emailAdd)
                     ->get();
            Log::channel('log_app')->info('Try To Login >> '.$emailAdd.'|'.$pass.'|'.$role_id.'|');
            error_log('Try To Login >>'.$emailAdd.'|'.$pass.'|'.$role_id.'|');

            #dd($role_id[0]->role_id);
                    

            #collection if else example
#            foreach ($role_id as $role_id) {
#                echo $role_id[0]->role_id;
#                if($role_id->role_id == 2){
#                    echo "admin";
#                }else{
#                    echo "user";
#                }
#            }
            $dataEmail = User::where ('email', $emailAdd)->first(); 
            
            if(count($dataEmail) > 0){
                if(Hash::check($pass, $dataEmail->password)){
                    if($role_id[0]->role_id == '2'){
                        Session::put('Session_role_admin', $role_id[0]->role_id);
                    }else{
                        Session::put('Session_role_user', $role_id[0]->role_id);
                    };
                    Session::put('Session_email', $dataEmail->email);
                    Session::put('Session_username', $dataEmail->username);
                    Session::put('Session_login', TRUE);
    
                    #update ketika login (users->updated_at)
                    $dataEmail->updated_at = date("Y-m-d H:i:s");
                    $dataEmail->save();

                    Log::channel('log_app')->info('LOGIN Success >> '.$dataEmail->email.'|'.$role_id[0]->role_id.'|'.$dataEmail->username.'|updated_at : '.$dataEmail->updated_at.'|');

                    error_log('Login Success >> '.$dataEmail->email.'|'.$role_id[0]->role_id.'|'.$dataEmail->username.'|updated_at : '.$dataEmail->updated_at.'|');

                    return redirect('/homepage');
                }else
                {
                    Log::channel('log_app')->info('Try To Login >> Wrong Password @'.$emailAdd);
                    
                    error_log('Try To Login >> Wrong Password @'.$emailAdd);

                    session()->flash('wrongPs', 'wrong password ! '); 
                    return \Redirect::back()->withInput();
                }
            }else{
                    Log::channel('log_app')->info('Try To Login >> no user existed ! @'.$emailAdd);

                    error_log('Try To Login >> no user existed ! @'.$emailAdd);        

                    session()->flash('noUser', 'no user matched with data inserted !, please register '); 
                    return \Redirect::back()->withInput();
            }
        }
    }
     public function logout(Request $request)
    {
        $Ses_email = $request->session()->get('Session_email');
        $Ses_username = $request->session()->get('Session_username');
        if($request->session()->has('Session_role_admin') == TRUE){
            $Ses_role_id = $request->session()->get('Session_role_admin');
        }else{
            $Ses_role_id = $request->session()->get('Session_role_user');    
        }

        $request->session()->flush();
        Log::channel('log_app')->info('LOGOUT Success >> '.$Ses_email.'|'.$Ses_role_id.'|'.$Ses_username);


        error_log('LOGOUT Success >> '.$Ses_email.'|'.$Ses_role_id.'|'.$Ses_username);
         
        return redirect('/'); 
    }
}
