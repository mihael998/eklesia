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

Route::middleware('auth:api')->get('utente/verification', "AuthApi\LoginController@index");
Route::middleware('auth:api')->get('utente', "AuthApi\LoginController@utente");
Route::post('utente', "AuthApi\LoginController@login");
Route::middleware('auth:api')->post('utente/logout', "AuthApi\LoginController@logout");
Route::get('mail/verification/{mail}', "AuthApi\LoginController@mailVerification");
Route::middleware('auth:api')->get('chiesa/{id}','Api\ChiesaController@show');
Route::middleware('auth:api')->post('chiese','Api\ChiesaController@index');

Route::middleware('auth:api')->get('congregazioni','Api\CongregazioniController@index');
Route::middleware('auth:api')->get('denominazioni','Api\DenominazioneController@index');
Route::middleware('auth:api')->get('places/{filter}','Api\PlacesController@show');
