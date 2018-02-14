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

<<<<<<< HEAD
Route::middleware('auth:api')->get('/utente', function (Request $request) {
    return response()->json([
        'message' => 'ok'
    ]);
});
=======
Route::middleware('auth:api')->get('utente', "AuthApi\LoginController@index");
>>>>>>> 9ef95aebd378e125c7d30bac96343ec552e61fa7
