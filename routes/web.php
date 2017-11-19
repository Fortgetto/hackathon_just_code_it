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
//Route::group(['middleware'=>'App\Http\Middleware\AuthUser'], function(){



Route::get('/', ['as'=>'results','uses'=>'Front\Main@index'])->middleware('auth.basic');

Route::group(['prefix' => 'tabs'],function (){
    Route::get('/results',['as'=>'results','uses'=>'Front\Main@index']);
    Route::get('/favourites',['as'=>'favourites','uses'=>'Front\Main@index']);
    Route::get('/comparison',['as'=>'comparison','uses'=>'Front\Main@index']);
});
Route::prefix('/pars')->group(function () {
    Route::get('', 'Parser@get_news');
    //Route::get('', 'Parser@test');
});
//});
Auth::routes();
Route::get('/test', 'CategoriesController@index');
Route::get('/test2', 'KeyWordController@index');
Route::get('/test3', 'Front\Main@calculation');

Route::get('/addcat', 'CategoriesController@add_category');
Route::get('/addword', 'KeyWordController@add_key_word');
Route::get('/home', 'HomeController@index')->name('home');
