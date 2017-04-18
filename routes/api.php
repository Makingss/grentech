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


Route::post('/question/follower', function (Request $request) {
//	dd($request->all());
	$goods = \App\Admin\Models\Goods\Good::where('goods_id', 1)->paginate(2)->toJson();
//	dd($goods);
	$comment = \App\Models\Comment::where('id', $request->get('question'))->count();
	if ($comment) {
		return response()->json(['followed' => true]);
	}
	return response()->json(['followed' => false]);
});

Route::post('/brand', 'BrandController@getBrand')->middleware('api');

Route::get('/goods', 'GoodsController@getGoods')->middleware('api');

//Route::post('/api/login',function(Request $request){
//	dd($request->all());
//})->middleware('api');

##########################################################################
Route::group(['namespace' => 'Apis'], function () {

	Route::post('/register', 'RegisterController@register');
	Route::post('/verify', 'RegisterController@registerVerify')->name('api.email.verify');
	Route::post('/login', 'LoginController@login');
	Route::get('/nice', 'LoginController@nice')->middleware('auth:api');
//    Route::post('/login', 'AdminLoginController@postLogin');
});

Route::group(['namespace' => 'Apis\Carts'], function () {
	Route::get('/cart', 'CartObjectController@index')->middleware('auth:api');
	Route::Post('/cartAdd', 'CartObjectController@store')->middleware('auth:api');
	Route::Post('/cartUpdate', 'CartObjectController@update')->middleware('auth:api');//
	Route::post('/cartDelete', 'CartObjectController@destroy');
});

Route::group(['namespace' => 'Apis\Orders'], function () {
	Route::get('/order', 'OrderController@index')->middleware('auth:api');
	Route::post('/orderAdd', 'OrderController@store')->middleware('auth:api');
	Route::post('/orderUpdate', function () {
		dd('fdfdfdfs');
	})->middleware('auth:api');
//	Route::get('cart/store','CartObjectController@store');
});
