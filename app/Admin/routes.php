<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => Admin::controllerNamespace(),
    'middleware' => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'IndexController@index');
    $router->post('/fileupload','ToolsbaseController@fileUpload');
    $router->post('/fileupload/remove','ToolsbaseController@remove');
//    $router->post('/goods/update_z','GoodsController@update_z');
    $router->resource('/painter', 'PainterController');
    $router->resource('/goods', 'GoodsController');
    $router->resource('/goodstype','GoodsTypeController');
    $router->resource('goodscat','GoodsCatController');
    $router->resource('/articles','ArticleController');
    $router->resource('/wangeditor','WangEditorController');
    $router->resource('/product','ProductController');
    $router->get('/product/{product}/create','ProductController@create');
//    $router->put('/product/{product}','ProductController@store');
});

