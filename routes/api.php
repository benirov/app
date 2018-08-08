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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});

Route::group(['middleware' => 'verifySession'], function () {
	Route::resource('users', 'User\UserController');
	Route::resource('company', 'Company\CompanyController');
	Route::resource('getUser', 'Auth\LoginController');

	Route::resource('masters', 'Master\MasterController');
	Route::get('masterdetail/{id}', 'Master\MasterController@getMasterDetail');
	Route::get('clientcompanies/{id}', 'Company\CompanyController@getClients');
	Route::get('clientusers/{id}', 'Client\ClientController@getUserClients');       
     
});

