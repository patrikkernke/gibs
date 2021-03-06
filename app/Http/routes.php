<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('field/overdue/all', [
	'as' => 'field.overdue.all',
	'uses' => 'FilterController@overdueAll'
]);

Route::get('field/return/{owner_id}', [
	'as'   => 'field.return',
	'uses' => 'OwnerController@returnField'
]);

Route::get('field/{field_id}/worked/{publisher_id}', [
	'as'   => 'field.workedBy',
	'uses' => 'ProtocolController@worked'
]);

Route::get('field/{id}/worked', [
	'as'   => 'field.worked',
	'uses' => 'ProtocolController@create'
]);

Route::resource('protocol', 'ProtocolController', ['except' => ['index', 'create']]);


Route::get('field/{id}/issue', [
	'as'   => 'field.issue',
	'uses' => 'OwnerController@create'
]);
Route::resource('owner', 'OwnerController', ['except' => ['index', 'create']]);

Route::resource('publisher', 'PublisherController');

Route::get('area/{id}/fields', [
	'as'   => 'area.fields',
	'uses' => 'FieldController@index'
]);
Route::get('field/create/{shortcut}/area', [
	'as'   => 'field.create',
	'uses' => 'FieldController@create'
]);
Route::resource('field', 'FieldController', ['except' => ['index','create']]);
Route::resource('area', 'AreaController');

/*==========  Area-Routes  ==========*/

Route::get('areal/{id}/gebiete', [
	'as'   => 'area.fields',
	'uses' => 'AreaController@fields'
]);

Route::get('areale', [
	'as'   => 'areas',
	'uses' => 'AreaController@index'
]);

/*==========  Home-Page  ==========*/

Route::get('/', function() {
	return redirect()->route('areas.index');
});
