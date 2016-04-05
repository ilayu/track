<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
  Route::get('/', function () {
    return view('welcome');
  })->name('welcome');

// PageController
  Route::get('{page}', [
    'uses' => 'PageController@getPage',
    'as' => 'getPage'
  ]);
  Route::post('signin', [
    'uses' => 'PageController@signIn',
    'as' => 'signIn'
  ]);
  Route::post('signup', [
    'uses' => 'PageController@signUp',
    'as' => 'signUp'
  ]);
  Route::get('logout', [
    'uses' => 'PageController@logOut',
    'as' => 'logOut'
  ]);


// Shell
  Route::post('shell', [
    'uses' => 'ShellController@shell',
    'as' => 'shell'
  ]);


});