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

// Front TODO通常のURLでのアクセスを拒否
Route::get('/', function () {
// Route::get('/{any}', function () {
    return view('front');
});
// })->where('any', '.*');

// Admin
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin');
    });
});
