<?php
use Illuminate\Support\Facades\Redis;

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
//Route::get('/', 'SitesController@index');
Route::get('/app', 'SitesController@app');
Route::get('/about', 'SitesController@about');
Route::get('content', 'SitesController@content');
/*
Route::get('/articles','ArticleController@index');
Route::get('/articles/create','ArticleController@create');
Route::get('/articles/{id}','ArticleController@show');
Route::post('/articles','ArticleController@store');
*/
Route::get('/email/verify/{token}', ['as' => 'email.verify', 'uses' => 'Email\EmailController@verify']);
Route::resource('articles', 'ArticleController');

Auth::routes();
/*
	********************以下为 pc mall路由控制**************
*/
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/shopcart', 'ShopcartController@index');
Route::get('/passport_login', 'Passport_loginController@index');
Route::get('/passport_register', 'Passport_registerController@index');
Route::get('/mall_goodsdetail', 'Mall_goodsdetailController@index');
Route::get('/mall_search', 'Mall_searchController@index');
Route::get('/app_link', 'App_linkController@index');
Route::get('/footer', 'Mall_footerController@index');
Route::get('/goods_detail', 'Goods_detailController@index');

/*
	***************************end*************************
*/

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
Route::resource('/search', 'SearchController');
//Route::get('mall/login','');

Route::get('/demo', function () {
	Auth::loginUsingId(24);
	$question = \App\Models\Comment::find(1);
	return view('demo', compact('question'));
});
//Route::post('/api/login', 'Apis\LoginController@login');

Route::post('/table', 'GoodsController@getTableColumns');
Route::get('/goods/cat', 'GoodsCatController@index');
Route::resource('/goods/type', 'GoodsTypeController');
Route::group(['namespace' => 'Goods'], function () {
	Route::get('/getkeywords', 'KeywordController@getKeywords');
	Route::get('/similar', 'KeywordController@similarByKeys');
});

Route::group(['namespace' => 'Members'], function () {
	Auth::loginUsingId(4);
	Route::resource('addr', 'MemberaddrsController');
});

Route::group(['namespace' => 'Carts'], function () {
	Route::resource('cart', 'CartObjectController');
//	Route::get('cart/store','CartObjectController@store');
});
/*
 * 向Ioc 容器填加自己的类 测试用例
 */
Route::get('/billing', function () {
	$billing = app('billing');
	dd($billing->charge());
});
/**
 * 契约的测试用例
 */
Route::get('/contract', function () {
//	dd(app('Illuminate\Contracts\Config\Repository')['database']['redis']);
//	dd(Config::get('database.redis'));
//	dd(app('config')['database']['redis']);
	dd(app('Illuminate\Contracts\Config\Repository'));
});
Route::group(['namespace' => 'Redis'], function () {
	Route::get('/redis', 'RedisController@index');
});
//Route::get('/redis', function () {
//redis 缓存
#Cache::put('name','Making',30);
#return Cache::get('name');
//设置 redis 值
#Redis::set($key,$value);
#if(Redis::exists($key)){
#	return Redis::get($key);
#}
//	$key = 'name:list1';
//	Redis::sadd($key, ['Making', 'Master', 'wu', 'yan', 'ping']);
//	Redis::Del($key);
//	Redis::set('name', 'Making');
//	$values = Redis::lrange('names', 2, 3);
//	return $values;
//获取集合元素总数(如果指定键不存在返回0)
//	$nums = Redis::scard($key);
//	Redis::setnx('wwww', 'fdsfdsfdsfdsfdsfdsaf');
//	if ($nums > 0) {
//		//从指定集合中随机获取
//		return Redis::srandmember($key, 2);
//	}
//});
//Route::resource('datatables', 'DatatablesController', [
//    'anyData'  => 'datatables.data',
//    'getIndex' => 'datatables',
//]);
