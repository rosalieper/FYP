<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usercontroller/path',[
   'middleware' => 'First',
   'uses' => 'UserController@showPath'
]);
Route::resource('user','UserController');
Route::get('/register2',function(){
   return view('register');
});
Route::post('/user/register',array('uses'=>'UserRegistration@postRegister'));
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

Route::get('/importExport', 'maatwebsiteControler@importExport');
Route::get('/downloadExcel/{type}', 'maatwebsiteControler@downloadExcel');
Route::post('/importExcel', 'maatwebsiteControler@importExcel');
Route::get('/create/ticket','UserController@create');
Route::post('/create/ticket','UserController@store');
Route::get('/tickets', 'UserController@index');
Route::get('/edit/ticket/{id}','UserController@edit');
Route::post('/edit/ticket/{id}','UserController@update');
Route::delete('/delete/ticket/{id}','UserController@destroy');

