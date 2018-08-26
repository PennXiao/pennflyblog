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
	Route::get('/','BlogController@index');
	Route::get('blog/{id?}','BlogController@blog')->name('blogInfo');
	Route::get('getMd/{id?}','BlogController@getBlogMd');

	Route::prefix('admin')->group(function () {
	    Route::get('/', 'BlogAdminController@index')->name('admin.index');

	    Route::get('nav', 'BlogAdminController@navList')->name('admin.nav');
	    Route::post('nav','BlogAdminController@navPost')->name('admin.navPost');

	    Route::get('blog','BlogAdminController@bloglist')->name('admin.blog');
	    Route::get('blog/add/{id?}','BlogAdminController@blogAdd')->name('admin.blogAdd');
	    Route::post('blog/add','BlogAdminController@blogPost')->name('admin.blogPost');

	    Route::get('tag','BlogAdminController@taglist')->name('admin.tag');
	    Route::post('tag','BlogAdminController@tagPost')->name('admin.tagPost');
	});
	
});

Route::any('chat','ChatController@index');

Route::any('register',function(){
	abort(404);#屏蔽注册网址
});

Route::any('logout',function(){
	Auth::logout();
	return back();
});

Auth::routes();
