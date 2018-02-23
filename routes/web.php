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

Route::get('/', function () {
    return redirect("chiesa/home");
});

Auth::routes();
Route::get('chiese/registra','ChiesaController@create');
Route::get('regioni/{id}/province','ProvinceController@index');
Route::get('province/{id}/comuni','ComuniController@index');

//routes Chiesa
Route::get('chiesa/home','ChiesaController@show')->name("home");
Route::post('chiese/registra','ChiesaController@store')->name('registraChiesa');
Route::patch('chiesa/modifica','ChiesaController@update')->name('modificaChiesa');

//routes Incontri
Route::post('chiesa/incontri','IncontriController@store')->name('aggiungiIncontro');
Route::get('chiesa/incontri','IncontriController@index')->name("incontri");
Route::delete('chiesa/incontri/{id}','IncontriController@destroy')->name('eliminaIncontro');

//routes Comunicazioni
Route::get('chiesa/comunicazioni','ComunicazioniController@index')->name("comunicazioni");
Route::post('chiesa/comunicazioni','ComunicazioniController@store')->name('aggiungiComunicazione');
Route::delete('chiesa/comunicazioni/{id}','ComunicazioniController@destroy')->name('eliminaComunicazione');
Route::patch('chiesa/comunicazioni/{id}','ComunicazioniController@update')->name('modificaComunicazione');

//routes Eventi
Route::get('chiesa/eventi','EventiController@index')->name("eventi");
Route::post('chiesa/eventi','EventiController@store')->name('aggiungiEvento');
Route::delete('chiesa/eventi/{id}','EventiController@destroy')->name('eliminaEvento');

//routes Prediche
Route::get('chiesa/prediche','PredicheController@index')->name("prediche");
Route::post('chiesa/prediche','PredicheController@store')->name('aggiungiPredica');
Route::delete('chiesa/prediche/{id}','PredicheController@destroy')->name('eliminaPredica');
