<?php

use Illuminate\Http\Request;

use App\Article;

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

Route::group(['middleware' => 'api'], function () {
    Route::resource('articles', 'ArticleController');
    Route::resource('/admin/menus', 'Admin\AdminMenuController');
});
