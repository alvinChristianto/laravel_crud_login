#notes for git log ad2b133

aplikasi sudah deploy di heroku dan database di db4free.net(alvin_lara, db4freemeUP93)

#error
1. laravel the only support ciphers are AES-128-CBC ..
	- SOLVED : php artisan key:generate
2. base table not found 
	- SOLVED : laravel migrate table sebaiknya huruf kecil untuk memudahkan deploy di heroku bash dan db4free (singkon huruf antara migrate, model, bash heroku )
3. count() parameter must be an array or ...
	- SOLVED : COMPATIBILITY antara laravel dengan php 7.2. add pada controller (semua): if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

4. heroku dan laravel logging. logging laravel di heroku berbeda. harus edit config/app.php lalu edit 'Log' => env('APP_LOG', 'errorlog'), lalu tulis log yang ingin dicatat dengan error_log('Try To Login >>'.$emailAdd.'|'.$pass.'|'.$role_id.'|');
