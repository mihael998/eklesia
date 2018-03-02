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

Route::middleware('auth:api')->get('utente', "AuthApi\LoginController@index");
Route::post('utente', "AuthApi\LoginController@login");
Route::middleware('auth:api')->post('utente/logout', "AuthApi\LoginController@logout");
Route::get('mail/verification/{mail}', "AuthApi\LoginController@mailVerification");
