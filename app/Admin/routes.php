<?php

use Illuminate\Routing\Router;

Route::group([
	'prefix' => config('admin.prefix'),
	'namespace' => Admin::controllerNamespace(),
	'middleware' => ['web', 'admin'],
], function (Router $router) {
	$router->get('/', 'IndexController@index');
	$router->get('/goods/getgoods', 'GoodsController@getgoods');
	$router->get('/goods/getindex', 'GoodsController@getindex');
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
	$router->get('/product/{product}/create', 'ProductController@create');
	$router->get('/specvalue/values/{spec_id}', 'SpecvaluesController@spec_value');
	$router->post('/specvalue/specvalueeditor', 'SpecvaluesController@specvalue_editor');
	$router->get('/electric/getindex/{id}', 'ElectricController@getIndex');
	$router->post('/electric/setajax', 'ElectricController@setAjax');

//	$router->get('/products/{key?}', 'DatatablesController@index');
//	$router->get('/products/data/{goods_id}', 'DatatablesController@anyData');
//	$router->post('/products/editor', 'DatatablesController@editor');
});


