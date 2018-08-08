<?php

use Illuminate\Http\Request;

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

	Route::resource('masters', 'Master\MasterController')->middleware('verifySession');;
	Route::get('masterdetail/{id}', 'Master\MasterController@getMasterDetail');
	Route::get('clientcompanies/{id}', 'Company\CompanyController@getClients');
	Route::get('clientusers/{id}', 'Client\ClientController@getUserClients');       
     


