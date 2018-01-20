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


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{slug?}', 'BlogController@article')->name('article');


/*
 * Admin panel
 */

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function (){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');

    Route::get('/category', 'CategoryController@index', ['as' => 'admin'])->name('category.index');
    Route::post('/category/create', 'CategoryController@create', ['as' => 'admin'])->name('category.create');
    Route::post('/category/store', 'CategoryController@store', ['as' => 'admin'])->name('category.store');
    Route::get('/category/edit', 'CategoryController@edit', ['as' => 'admin'])->name('category.edit');
    Route::get('/article', 'ArticleController@index', ['as' => 'admin'])->name('article.index');
    Route::post('/article/{create?}', 'ArticleController@create')->name('article.create');
    Route::post('/article/edit', 'ArticleController@edit', ['as' => 'admin'])->name('article.edit');

} );

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});
