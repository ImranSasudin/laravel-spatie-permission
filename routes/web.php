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


Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('/permission', 'PermissionController@index')->name('permission')->middleware('role:super-admin');
    Route::get('/role', 'RoleController@index')->name('role')->middleware('role:super-admin');
    Route::get('/article', 'ArticleController@index')->name('article')->middleware('permission:view articles');
    Route::get('/post', 'PostController@index')->name('post')->middleware('permission:view posts');
});

require __DIR__.'/auth.php';
