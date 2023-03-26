<?php

/**
 * Made by CV. IRANDO
 * https://irando.co.id ©2023
 * info@irando.co.id
 */

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('blog')->group(function() {
    //show all posts
    Route::get('/', 'Api\BlogController@index');
    //show single post
    Route::get('/posts/{slug}', 'Api\BlogController@post');
    //show single category with posts
    Route::get('/categories/{slug}', 'Api\BlogController@category');
});
