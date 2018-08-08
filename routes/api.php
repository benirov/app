<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');




	Route::resource('users', 'User\UserController');
	Route::resource('company', 'Company\CompanyController');
	Route::resource('getUser', 'Auth\LoginController');

	Route::resource('masters', 'Master\MasterController');
	Route::get('masterdetail/{id}', 'Master\MasterController@getMasterDetail')->middleware('verifySession:0');;
	Route::get('clientcompanies/{id}', 'Company\CompanyController@getClients')->middleware('verifySession:1');
	Route::get('clientusers/{id}', 'Client\ClientController@getUserClients');       
     


