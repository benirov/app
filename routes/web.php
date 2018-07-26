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

Route::get('/', 'HomeController@getViewLogin')->name('login');
Route::get('/login', 'HomeController@getViewLogin')->name('login');

Route::get('/registration', 'HomeController@getViewRegistration')->name('registration');

// Route::get('/login', 'HomeController@getViewLogin')->name('login');
Route::post('users', 'User\UserController@store');
Route::post('getUser', 'Auth\LoginController@getUser');

// vista de logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

