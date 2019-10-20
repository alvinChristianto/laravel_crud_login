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
        $listpost = DB::table('createblog')
                    ->orderBy('created_at','DESC')
                    ->get();

        #dd($listpost);
        if(count($listpost) > 0 ){
            return view('front', ['listpost' => $listpost]);
        }else{
            session()->flash('nodata',"no data found");
                return view('front');
        }
    }

    public function getMovie()
    {   
        #$command = escapeshellcmd('python /home/alvinchristianto/Documents/test/name.py alvin');
        $command = escapeshellcmd('python /home/alvinchristianto/Documents/logging/bukalapak/21cine/scrX1.py')
        $data = shell_exec($command);

        $listData = DB::connection('mysql2')
                    ->select('select * from TB_MOVIE_LIST order by movie_id desc');
        //$listData->setConnection('mysql2');
        #$listData = DB::table('TB_SEQ_ID')
        #           ->orderBy('idseq','DESC')
        #            ->get();
        //dd($listData);
        return view('movie.getmovie', ['listData' => $listData]);
    }
   
   
}

