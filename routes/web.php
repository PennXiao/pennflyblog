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

Route::namespace('Blog')->group(function () {
    // 在 "App\Http\Controllers\Blog" 命名空间下的控制器
	Route::get('/','BlogController@index');
	Route::prefix('admin')->group(function () {
	    Route::get('/', 'BlogAdminController@index')->name('admin.index');

	    Route::get('nav', 'BlogAdminController@navList')->name('admin.nav');
	    Route::post('nav','BlogAdminController@navPost')->name('admin.navPost');

	    Route::get('blog','BlogAdminController@bloglist')->name('admin.blog');

	    Route::get('blog/add/{id?}',function($id=null){
	    	return view('admin.blogAdd',['data'=>\App\Blog\Blog::find($id)]);
	    })->name('admin.blogAdd');

	    Route::post('blog/add','BlogAdminController@blogPost')->name('admin.blogPost');

	    Route::get('tag','BlogAdminController@tag')->name('admin.tag');
	    Route::post('tag','BlogAdminController@tagPost')->name('admin.tagPost');

	});
});