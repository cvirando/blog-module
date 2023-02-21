<?php

/**
 * Made by CV. IRANDO
 * https://irando.co.id ©2023
 * info@irando.co.id
 */

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

Route::prefix('blog/posts')->group(function() {
    Route::get('/', 'PostsController@index')->name('blogPosts');
    Route::get('/create', 'PostsController@create')->name('blogPostsCreate');
    Route::post('/store', 'PostsController@store')->name('blogPostsStore');
    Route::get('/edit/{id}', 'PostsController@edit')->name('blogPostsEdit');
    Route::put('/update/{id}', 'PostsController@update')->name('blogPostsUpdate');
    Route::delete('/delete/{id}', 'PostsController@destroy')->name('blogPostsDelete');

});
Route::prefix('blog/categories')->group(function() {
    Route::get('/', 'CategoriesController@index')->name('blogCategories');
    Route::get('/create', 'CategoriesController@create')->name('blogCategoriesCreate');
    Route::post('/store', 'CategoriesController@store')->name('blogCategoriesStore');
    Route::get('/edit/{id}', 'CategoriesController@edit')->name('blogCategoriesEdit');
    Route::put('/update/{id}', 'CategoriesController@update')->name('blogCategoriesUpdate');
    Route::delete('/delete/{id}', 'CategoriesController@destroy')->name('blogCategoriesDelete');
});

Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index')->name('blogIndex');
    Route::get('/{slug}', 'BlogController@show')->name('blogShow');
});
