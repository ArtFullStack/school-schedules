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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', 'App\Http\Controllers\AdminController@index')->name('dashboard');
    Route::resource('/classes', 'App\Http\Controllers\ClassController');
    Route::resource('/teachers', 'App\Http\Controllers\TeacherController');
    Route::resource('/schedule', 'App\Http\Controllers\ScheduleController');
});



