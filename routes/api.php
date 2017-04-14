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


Route::post('/question/follower', 'GoodsController@getGoods')->middleware('auth:api');
//function (Request $request) {
//	dd($request->all());
//	$goods = \App\Admin\Models\Good::where('goods_id',1)->paginate(2)->toJson();
//	dd($goods);
//	$comment = \App\Models\Comment::where('id', $request->get('question'))->count();
//	if ($comment) {
//		return response()->json(['followed' => true]);
//	}
//	return response()->json(['followed' => false]);
//}

Route::post('/brand', 'BrandController@getBrand')->middleware('api');

Route::get('/goods', 'GoodsController@getGoods')->middleware('api');

//Route::post('/api/login',function(Request $request){
//	dd($request->all());
//})->middleware('api');

##########################################################################
Route::group(['namespace' => 'Apis'], function () {

    Route::post('/register', 'RegisterController@register');
    Route::post('/verify', 'RegisterController@registerVerify')->name('api.email.verify');
//    Route::post('/login', 'LoginController@login');

    Route::post('/login', 'AdminLoginController@postLogin');
});
