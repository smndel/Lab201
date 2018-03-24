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
Route::middleware(['auth'])->group(
	function(){
		Route::resource('partner', 'PartnerController');
		Route::resource('service', 'ServiceController');
		Route::resource('actuality', 'ActualityController');
		Route::resource('accreditation', 'AccreditationController');
		Route::resource('reference', 'ReferenceController');
		Route::resource('testimony', 'TestimonyController');
		Route::get('events', 'EventController@index')->name('calendar');
		Route::post('/data/applicant', 'ApplicantController@getApplicants')->name('ApplicantProcessing');
		Route::resource('applicant', 'ApplicantController');
		Route::get('admin', 'BackController@index')->name('admin.index');
});