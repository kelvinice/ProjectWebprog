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

Route::resource('forums','ForumController');
Route::resource('threads','ThreadController');
Route::resource('messages','MessageController');
Route::resource('popularities','PopularityController');

Route::get('/', 'ForumController@home');

Route::get('/login', 'LoginController@goLogin');
Route::get('/register', 'RegisterController@goRegister');

Route::post('/doLogin', 'LoginController@doLogin');
Route::post('/doLogout', 'LoginController@doLogout');
Route::post('/doRegister', 'RegisterController@doRegister');

Route::group(['middleware' => ['login']], function (){
    Route::get('/profile/{id}','UserController@goProfile');
    Route::resource('categories','CategoryController',['only' => [
        'update','edit'
    ]]);
    Route::get('/myForum','ForumController@showMyForum');
});

Route::group(['middleware' => ['user']], function (){
    Route::get('/editProfile/{id}','UserController@goUpdateProfile');
    Route::put('/updateProfile/{id}','UserController@update');
});
Route::group(['middleware' => ['admin']], function (){
    Route::resource('categories','CategoryController');
    Route::resource('users', 'UserController')->only([
        'index','create','destroy','edit','update'
    ]);
});
