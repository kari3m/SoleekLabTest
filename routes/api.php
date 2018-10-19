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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::middleware('jwt.auth')->group(function () {
    Route::get('/user', function (Request $request) {return auth()->user(); });
    Route::get('country', 'CountryController@index');
    Route::get('countries', 'CountryController@getAllCountries');

});

// Route::group(['middleware' => ['jwt.verify']], function() {
//     // Route::get('user', 'UserController@getAuthenticatedUser');
//     // Route::get('closed', 'DataController@closed');
//     Route::get('country', 'CountryController@index');
// });


Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');
