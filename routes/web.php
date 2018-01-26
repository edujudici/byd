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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('language','HomeController@language');

Route::get('/',  ['as' => 'home.show',  'uses' => 'HomeController@show']);
Route::get('/about', ['as' => 'about.show', 'uses' => 'AboutController@show']);
Route::get('/services', ['as' => 'services.show', 'uses' => 'ServicesController@show']);
Route::get('/portifolio', ['as' => 'portifolio.show', 'uses' => 'PortifolioController@show']);
Route::get('/blog', ['as' => 'blog.show', 'uses' => 'BlogController@show']);
Route::get('/contact', ['as' => 'contact.show', 'uses' => 'ContactController@show']);
Route::post('/contact-send', ['as' => 'contact.send', 'uses' => 'ContactController@send']);