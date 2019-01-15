<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class ErrorController extends Controller
{
	public function notfound()
	{
		return view('errors.404');
	}
	public function fatal()
	{
		return view('errors.500');
	}
	public function unauthorized()
	{
		return view('errors.401');
	}
}
