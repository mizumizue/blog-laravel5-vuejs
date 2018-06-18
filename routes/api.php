<?php

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

use App\Models\Article;
use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function () {
    Route::get('articles', 'ArticleController@index');
});
