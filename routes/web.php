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
    return view('welcome');
});

Route::get('/estations/all', 'EstationController@index')
    ->name('estations');
Route::get('/estations/add', 'EstationController@create')
    ->name('estationAdd');
Route::post('/estations/store', 'EstationController@store')
    ->name('estationStore');
Route::get('/estations/filtered', 'EstationController@indexFiltered')
    ->name('estationsFiltered');
Route::get('/estations/show/{id}', 'EstationController@show')
    ->name('estationShow');
Route::post('/estations/update/{id}', 'EstationController@update')
    ->name('estationUpdate');
Route::get('/estations/destroy/{id}', 'EstationController@destroy')
    ->name('estationDelete');





