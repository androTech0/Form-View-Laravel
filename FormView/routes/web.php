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

// DML - Raw Query
// Route::get('student/create', 'App\Http\Controllers\Student\StudentController@create');
// Route::post('student/store', 'App\Http\Controllers\Student\StudentController@store2');
// Route::get('student/index', 'App\Http\Controllers\Student\StudentController@index');
// Route::get('student/edit/{id}', 'App\Http\Controllers\Student\StudentController@edit');
// Route::post('student/update/{id}', 'App\Http\Controllers\Student\StudentController@update');
// Route::get('student/delete/{id}', 'App\Http\Controllers\Student\StudentController@delete');

// DML - Query Builder
// Route::get('student/create', 'App\Http\Controllers\Student\StudentController2@create');
// Route::post('student/store', 'App\Http\Controllers\Student\StudentController2@store');
// Route::get('student/index', 'App\Http\Controllers\Student\StudentController2@index');
// Route::get('student/edit/{id}', 'App\Http\Controllers\Student\StudentController2@edit');
// Route::post('student/update/{id}', 'App\Http\Controllers\Student\StudentController2@update');
// Route::get('student/delete/{id}', 'App\Http\Controllers\Student\StudentController2@delete');

// Eloquent Model (ORM)
Route::get('student/create', 'App\Http\Controllers\Student\StudentController3@create');
Route::post('student/store', 'App\Http\Controllers\Student\StudentController3@store');
Route::get('student/index', 'App\Http\Controllers\Student\StudentController3@index2');
Route::get('student/edit/{id}', 'App\Http\Controllers\Student\StudentController3@edit');
Route::post('student/update/{id}', 'App\Http\Controllers\Student\StudentController3@update');
Route::get('student/delete/{id}', 'App\Http\Controllers\Student\StudentController3@delete');
Route::get('student/restore/{id}', 'App\Http\Controllers\Student\StudentController3@restore');
