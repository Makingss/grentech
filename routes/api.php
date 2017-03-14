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
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/news', function() {
//    session(['name'=>'pengbd3']);
    return [
        ['id' => 1, 'title' => 'new1'],
        ['id' => 2, 'title' => 'new2'],
        ['id' => 3, 'title' => 'new3'],
        ['id' => 4, 'title' => 'new4'],
    ];
});
Route::get('/newslist', function() {
    return [
        ['id' => 1, 'title' => 'new1'],
        ['id' => 2, 'title' => 'new2'],
        ['id' => 3, 'title' => 'new3'],
        ['id' => 4, 'title' => 'new4'],
    ];
});
Route::get('/newsdetail/{id}', function($id,Request $request) {
    return [
        'id' => 1,
        'title' => 'news',
        'content' => 'content',
        'created_at' => date('Y-m-d H:i:s')
    ];
});
