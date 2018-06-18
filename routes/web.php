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

use App\Models\NaviMenu;
use App\Models\SiteSetting;

// Front TODO通常のURLでのアクセスを拒否
Route::get('/', function () {
// Route::get('/{any}', function () {
    $siteSetting = SiteSetting::firstOrFail();
    return view('Layouts.Front.app', [
        'siteSetting' => $siteSetting,
    ]);
});
// })->where('any', '.*');

// Admin
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        $naviMenus = NaviMenu::orderBy('order', 'asc')->get();
        $siteSetting = SiteSetting::firstOrFail();
        return view('Layouts.Admin.app', [
            'naviMenus' => $naviMenus,
            'siteSetting' => $siteSetting,
        ]);
    });

    Route::resource('article', 'ArticleController');
});
