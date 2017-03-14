<?php
/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
	Route::get('/users', function () {
		return '我是管理员，我有授权！';
	});
});
Route::get('/', 'SitesController@index');
Route::get('/app', 'SitesController@app');
Route::get('/about', 'SitesController@about');
Route::get('content', 'SitesController@content');
/*
Route::get('/articles','ArticleController@index');
Route::get('/articles/create','ArticleController@create');
Route::get('/articles/{id}','ArticleController@show');
Route::post('/articles','ArticleController@store');
*/

Route::resource('articles', 'ArticleController');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('mall', 'Mall\MallController');

Route::get('oauth/redirect', 'OauthController@redirect');
Route::get('callback', 'OauthController@oauth');
Route::get('oauth', 'OauthController@showClient');
Route::get('notification', 'Notification@showNotitfcation');
Route::get('generate', 'Notification@generate');
Route::get('/notification/is_read/{id}', 'Notification@is_read');
Route::get('/captcha/{config?}', 'CaptchaController@getCaptcha');
Route::get('/datatables/{key?}', 'DatatablesController@index');
Route::get('/datatables/data/{goods_id}', 'DatatablesController@anyData');
Route::post('/datatables/editor', 'DatatablesController@editor');
Route::get('/apps', 'GoodsController@getindex');
Route::get('/demo', function () {
	return view('demo');
});
//Route::resource('datatables', 'DatatablesController', [
//    'anyData'  => 'datatables.data',
//    'getIndex' => 'datatables',
//]);
