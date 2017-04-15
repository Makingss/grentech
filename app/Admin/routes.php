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

    $router->resource('/auth/users',UserController::class);

    Route::group(['namespace'=>'Orders'],function(){
        Route::resource('/orders','OrderController');
    });
//	$router->resource('/orders',);
//	$router->get('/products/{key?}', 'DatatablesController@index');
//	$router->get('/products/data/{goods_id}', 'DatatablesController@anyData');
//	$router->post('/products/editor', 'DatatablesController@editor');
});


