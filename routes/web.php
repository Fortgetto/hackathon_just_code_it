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
Route::group(['prefix' => 'tabs'],function (){
    Route::get('/results',['as'=>'results','uses'=>'Front\Main@index']);
    Route::get('/favourites',['as'=>'favourites','uses'=>'Front\Main@index']);
    Route::get('/comparison',['as'=>'comparison','uses'=>'Front\Main@index']);
});
Route::prefix('/pars')->group(function () {
    Route::get('', 'Parser@get_news');
    //Route::get('', 'Parser@test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
