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
    return view('rapidtheme');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category
Route::get('all/category', 'CategoryController@allCategory')->name('all.category')->middleware('logincheck');
Route::post('add/category', 'CategoryController@addCategory')->name('add.category')->middleware('logincheck');
Route::get('edit/category/{id}', 'CategoryController@editCategory')->middleware('logincheck');
Route::post('update/category/{id}', 'CategoryController@updateCategory')->middleware('logincheck');
Route::get('delete/category/{id}', 'CategoryController@deleteCategory')->middleware('logincheck');

// Trash list
Route::get('restore/category/{id}', 'CategoryController@restoreCategory')->middleware('logincheck');
Route::get('force/delete/category/{id}', 'CategoryController@forceDeleteCategory')->middleware('logincheck');
