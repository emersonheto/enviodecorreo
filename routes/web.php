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
    return view('welcome');
});

Route::get('/mail', function () {
    $call="nada";
    $destino=["emersonheto@gmail.com"];
    \Mail::to($destino)->send(new App\Mail\EnvioCorreoMail($call));

    return "correo enviado";
})->name('mail');
 
	
Route::get('/correosend', 'sendemailController@enviarcorreo')->name('mail2');


Route::get('/envioJob', 'sendemailController@envioConjob')->name('job');