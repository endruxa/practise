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


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

//Home

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/about', 'HomeController@about')->name('about');
Route::get('/home/post', 'HomeController@post')->name('post');
Route::get('/home/contact', 'HomeController@contact')->name('contact');


//Users

Route::get('/blog/category/{slug}', 'BlogController@category')->name('category');
Route::get('/blog/article/{slug}', 'BlogController@article')->name('article');


//Admin panel

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('/', 'AdminDashboardController@dashboard')->name('admin.index');

    Route::resource('/category', 'AdminCategoryController', ['as' => 'admin']);
    Route::resource('/article', 'AdminArticleController', ['as' => 'admin']);

    Route::group(['prefix' => 'users'], function(){
        Route::resource('/user', 'AdminUserController', ['as' => 'admin.users']);
    });
});


//CKEditor

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
});
