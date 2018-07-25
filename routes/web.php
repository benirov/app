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


Route::group(['middleware' => 'verifySession'], function () {
       
     Route::get('/home', 'HomeController@getHome')->name('home');
   });

Route::group(['middleware' => 'verifyLogin'], function () {
       
     Route::get('/', 'HomeController@getHome')->name('login');
     Route::get('/login', 'HomeController@getViewLogin')->name('login');
   });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
// });

Route::get('/registration', 'HomeController@getViewRegistration')->name('registration');

// Route::get('/login', 'HomeController@getViewLogin')->name('login');
Route::post('users', 'User\UserController@store');
Route::post('getUser', 'Auth\LoginController@getUser');

