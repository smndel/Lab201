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

Route::get('/', 'FrontController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin', 'AfogecController')->middleware('auth');

Route::resource('applicant', 'ApplicantController')->middleware('auth');

Route::post('/data/applicant', 'ApplicantController@getUsers')->name('dataProcessing');