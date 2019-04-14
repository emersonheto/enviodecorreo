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

    $destino=["emersonheto@gmail.com"];
    Mail::to($destino)->send(new EnvioCorreoMail());

    return "correo enviado";
})->name('mail');
