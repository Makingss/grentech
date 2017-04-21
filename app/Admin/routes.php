<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => Admin::controllerNamespace(),
    'middleware' => ['web', 'admin'],
], function (Router $router) {
    $router->get('/', 'IndexController@index');
    $router->get('/goods/getgoods', 'Goods\GoodsController@getgoods');
    $router->get('/goods/getindex', 'Goods\GoodsController@getindex');
    $router->post('/fileupload', 'Ectools\ToolsbaseController@fileUpload');
    $router->post('/fileupload/remove', 'Ectools\ToolsbaseController@remove');

//    $router->post('/goods/update_z','GoodsController@update_z');
    $router->resource('/painter', 'PainterController');
    $router->resource('/goods', 'Goods\GoodsController');
    $router->resource('/goodstype', 'Goods\GoodsTypeController');
    $router->resource('goodscat', 'Goods\GoodsCatController');
    $router->resource('/articles', 'ArticleController');
//	$router->resource('/wangeditor', 'WangEditorController');
    $router->resource('/product', 'Products\ProductController');
    $router->resource('/brand', 'Goods\BrandController');
    $router->resource('/spec', 'Products\SpecificationController');
    $router->get('/product/{product}/create', 'Products\ProductController@create');
    $router->get('/specvalue/values/{spec_id}', 'Products\SpecvaluesController@spec_value');
    $router->post('/specvalue/specvalueeditor', 'Products\SpecvaluesController@specvalue_editor');
    $router->get('/electric/getindex/{id}', 'Goods\ElectricController@getIndex');
    $router->post('/electric/setajax', 'Goods\ElectricController@setAjax');

//	$router->resource('/orders',);
//	$router->get('/products/{key?}', 'DatatablesController@index');
//	$router->get('/products/data/{goods_id}', 'DatatablesController@anyData');
//	$router->post('/products/editor', 'DatatablesController@editor');

});

#################### User|member 用户路由 #############################

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => 'App\Admin\Controllers\Members',
    'middleware' => ['web', 'admin'],
], function (Router $router) {

    $router->resource('user/info', UserController::class);
    $router->resource('user/level', UserLevelController::class);
    $router->resource('user/permission', UserPermissionController::class);
    $router->resource('user/point', UserPointController::class);
});

#################### User|member 用户路由 #############################

#################### order 订单路由 #############################
Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => 'App\Http\Controllers\Orders',
    'middleware' => ['web', 'admin'],
], function () {
    Route::resource('/orders', OrderController::class);
});
#################### order 订单路由 #############################