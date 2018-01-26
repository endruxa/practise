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
    return view('blog.home');
});

Auth::routes();


//Home

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/about', 'HomeController@about')->name('about');
Route::get('/home/post', 'HomeController@post')->name('post');
Route::get('/home/contact', 'HomeController@contact')->name('contact');

//Users

Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{slug?}', 'BlogController@article')->name('article');


//Admin panel

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function (){

    Route::get('/', 'DashboardController@dashboard')->name('admin.index');

    Route::get('/category', 'CategoryController@index')->name('category.index');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store/{category}', 'CategoryController@store')->name('category.store');
    Route::get('/category/edit/{category}', 'CategoryController@edit')->name('category.edit');
    Route::any('/category/update/{category}', 'CategoryController@update')->name('category.update');
    Route::any('/category/destroy/{category}', 'CategoryController@destroy')->name('category.destroy');

    Route::get('/article', 'ArticleController@index')->name('article.index');
    Route::get('/article/create', 'ArticleController@create')->name('article.create');
    Route::post('/article/store/{article}', 'ArticleController@store')->name('article.store');
    Route::get('/article/edit/{article}', 'ArticleController@edit')->name('article.edit');
    Route::any('/article/update/{article}', 'ArticleController@update')->name('article.update');
    Route::any('/article/destroy/{article}', 'ArticleController@destroy')->name('article.destroy');
} );



//CKEditor

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
});
