<?php

use Illuminate\Support\Facades\Route;


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
    return view('auth.login');
});
Auth::routes();
Route::resource('avisos','AvisoController');
Route::resource('usuarios','UsuarioController');
Route::resource('grupos','GrupoController');
Route::get('/dashboard', function (){
    return view('dashboard');
});





