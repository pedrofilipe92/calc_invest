<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('/calculadora', 'CalculadoraController');
Route::post('/calculadora/calcular', 'CalculadoraController@calcular')->name('calculadora.calcular');
Route::resource('/investimento', 'InvestimentoController');
Route::resource('/carteira', 'CarteiraController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
