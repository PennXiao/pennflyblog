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

Route::get('/','BlogshowController@index');


Route::prefix('admin')->group(function () {
    Route::get('/', 'BlogAdminController@index')->name('admin.index');

    Route::get('nav', 'BlogAdminController@navList')->name('admin.nav');
    Route::post('nav','BlogAdminController@navPost')->name('admin.navPost');

    Route::get('blog','BlogAdminController@blog')->name('admin.blog');
    Route::post('blog','BlogAdminController@blogPost')->name('admin.blogPost');

    Route::get('tag','BlogAdminController@tag')->name('admin.tag');
    Route::post('tag','BlogAdminController@tagPost')->name('admin.tagPost');

});