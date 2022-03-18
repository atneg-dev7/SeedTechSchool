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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/myplayers', 'MyPlayersController@index')->name('myplayers');

Route::post('/player/add', 'PlayerController@add')->name('players.add');
Route::get('/player/register', 'PlayerController@register')->name('players.register');
Route::post('/player/modify', 'PlayerController@modify')->name('players.modify');
Route::post('/player/confirm', 'PlayerController@confirm')->name('players.confirm');
Route::get('/player/detail/{id}', 'PlayerController@detail')->name('players.detail');
Route::get('/player/edit/{id}', 'PlayerController@edit')->name('players.edit');
Route::post('/player/update', 'PlayerController@update')->name('players.update');
Route::get('/player/delete/{id}', 'PlayerController@delete')->name('players.delete');

Route::get('/performance/register/{id}', 'PerformanceController@register')->name('performances.register');
Route::post('/performance/confirm', 'PerformanceController@confirm')->name('performances.confirm');
Route::post('/performance/modify', 'PerformanceController@modify')->name('performances.modify');
Route::post('/performance/add', 'PerformanceController@add')->name('performances.add');
Route::post('/performance/delete', 'PerformanceController@delete')->name('performances.delete');
Route::get('/performance/edit{id}', 'PerformanceController@edit')->name('performances.edit');
Route::post('/performance/update', 'PerformanceController@update')->name('performances.update');
