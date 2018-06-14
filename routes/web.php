<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@submit');
Route::get('/myPhotos', 'MyPhotosController@show');
Route::get('/form', 'FormController@form');
Route::post('/form', 'FormController@submit');
Route::get('/thankyou', 'FormController@thankyou');
Route::get('/imageShow', 'ImageShowController@imageShow');
Route::delete('/imageShow/{imgId}', 'ImageShowController@destroy');
Route::get('/edit', 'EditController@edit');
Route::post('/edit', 'EditController@submit');

Route::get('/admin', 'AdminController@index');

Route::get('/soups', 'SoupsController@index');
Route::get('/snacks', 'SnacksController@index');
Route::get('/entrees', 'EntreesController@index');
Route::get('/desserts', 'DessertsController@index');
Route::get('/other', 'OtherController@index');
//filter


Auth::routes();

Route::get('/home', 'HomeController@index');
