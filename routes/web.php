<?php
#use App\Mail\NewUserNotification;
#use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#Route::get('/', function () {
#	Route::get('homeController@frontData');
#})->name('home');


#mail mailtrap
#Route::get('send-mail', function () {
#    Mail::to(get('email'))->send(new NewUserNotification()); 
#    return 'A message has been sent to Mailtrap!';

#}) ->name('send-mail');





Route::get('/', 'HomeController@frontData')->name('home');
Route::get('movie', 'HomeController@getMovie')->name('getMovie');

Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);
Route::get('401', ['as' => '401', 'uses' => 'ErrorController@unauthorized']);


Route::get('homepage', 'loginController@successLogin');
Route::get('register', 'registerController@getRegister')->name('register');
Route::get('login', 'loginController@getLogin')->name('login');
Route::post('postRegister', 'registerController@postRegister');

#verify
Route::get('/user/verify/{token}', 'registerController@verifyUser');
	
Route::post('postLogin', 'loginController@postLogin');
Route::get('all_user', 'registerController@alluser')->name('all_user');

Route::get('logout','loginController@logout')->name('logout');


Route::get('create', 'createController@createPost')->name('create');
Route::post('postBlog', 'createController@sendPost')->name('postBlog');
Route::get('list_post', 'createController@list_post')->name('list_post');
Route::get('/post/{id}', 'createController@seePost')->name('post');

Route::get('/preview/{id}', 'createController@preview')->name('preview');
Route::get('/preview/{id}/edit', 'createController@edit')->name('edit');
Route::post('edit_post/{id}', 'createController@edit_post')->name('edit_post');

Route::delete('/preview/{id}/delete', 'createController@delete')->name('delete');

Route::get('/front', function () {
    return view('pages.front');
});
Route::get('/about', function () {
    return view('pages.contact');
});