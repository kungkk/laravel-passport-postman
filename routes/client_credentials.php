<?php

//@link http://filljoyner.com/2017/03/01/how-to-use-client-credentials-grant-tokens-for-your-api-authorization-with-laravel-5-4s-passport/

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


Route::get('/articles', 'ArticleController@index');
//Route::middleware('auth:api')->get('/articles', 'ArticleController@index');