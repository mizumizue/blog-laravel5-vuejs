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

use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function () {
    Route::resource('article', 'ArticleController');
    Route::resource('admin_article', 'AdminArticleController');
    Route::resource('tag', 'TagController');
    Route::resource('navi_menu', 'NaviMenuController');
    Route::resource('site_setting', 'SiteSettingController');
});
