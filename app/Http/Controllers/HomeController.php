<?php

namespace App\Http\Controllers;

use App\blog;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class HomeController extends Controller
{
    public function frontData()
    {   
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
    
   
   
}
