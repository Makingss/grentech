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
//	return Auth::guard('api')->user();
	$comment = \App\Models\Comment::where('id', $request->get('question'))->count();
	if ($comment) {
		return response()->json(['followed' => true]);
	}
	return response()->json(['followed' => false]);
})->middleware('auth:api');

