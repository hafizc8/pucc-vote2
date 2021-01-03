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

Auth::routes();

// Route::get('/', 'ChatsController@index');
// Route::get('messages', 'ChatsController@fetchMessages');
// Route::post('messages', 'ChatsController@sendMessage');

Route::get('/', 'HomeController@index');
Route::get('get-masukan', 'HomeController@getMasukan');
Route::get('count-anggota', 'HomeController@getCountAnggota');
Route::get('data-paslon', 'HomeController@getDataPaslon');

Route::get('vote', 'HomeController@vote');
Route::post('send-vote', 'HomeController@sendVote');
Route::get('form-vote/{id}', 'HomeController@formVote');
Route::get('check-voted', 'HomeController@checkVoted');
Route::get('data-chart', 'HomeController@dataChart');