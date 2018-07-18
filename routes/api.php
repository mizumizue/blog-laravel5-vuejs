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
use Illuminate\Contracts\Encryption\DecryptException;

Route::group(['middleware' => 'api'], function () {
    // JWTでの認証用
    Route::post('authenticate', 'AuthenticateController@authenticate');

    // 認証不要(基本的にフロント側で使うもの)
    Route::resource('article', 'ArticleController');
    Route::resource('site_setting', 'SiteSettingController');

    // 要認証
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('navi_menu', 'NaviMenuController');
        Route::resource('admin_article', 'AdminArticleController');
        Route::resource('tag', 'TagController');
    });

    // JWTログアウト tymondesigns/jwt-auth#1399対策
    try {
        Route::get('logout', 'AuthenticateController@logout')->middleware('jwt.refresh');
    } catch (DecryptException $e) {
    }
});
