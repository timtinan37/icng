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

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function ()
{
	Route::get('/', function () {
	    return view('index');
	})->name('index');
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs.index')->middleware('can:view logs');
	Route::resource('users', 'UserController');
	Route::resource('branches', 'BranchController');
	Route::resource('policy-types', 'PolicyTypeController')->parameters(['policy-types' => 'policyType']);
});
