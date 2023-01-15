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

Route::get('/', function () {
    return view('welcome');
});

Route::get('student/create', 'App\Http\Controllers\Student\StudentController@create');
Route::post('student/store', 'App\Http\Controllers\Student\StudentController@store2');
Route::get('student/index', 'App\Http\Controllers\Student\StudentController@index');
Route::get('student/edit/{id}', 'App\Http\Controllers\Student\StudentController@edit');
Route::post('student/update/{id}', 'App\Http\Controllers\Student\StudentController@update');
Route::get('student/delete/{id}', 'App\Http\Controllers\Student\StudentController@delete');
