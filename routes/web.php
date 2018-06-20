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

use App\Models\SiteSetting;

Route::get('/{any}', function () {
    /* TODO サイト設定が見つからなかった場合は、Illuminate\Database\Eloquent\ModelNotFoundException
     * をcatchして別のErrorページに飛ばす
     */
    $siteSetting = SiteSetting::firstOrFail();
    return view('Layouts.base', [
        'siteSetting' => $siteSetting
    ]);
})->where('any', '.*');
