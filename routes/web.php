<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*前端路由home*/
Route::group([],function(){
    //order
        Route::get('/order/{order_id}', 'Home\IndexController@order');
    //ui_list
        Route::get('/cate_list/{cate_id}', 'Home\IndexController@cate_list');
    //view
        Route::get('/view/{art_id}', 'Home\IndexController@view');
});



/*前端路由home2*/
Route::group([],function(){
    //用户注册
    Route::get('/register','Home\IndexController@register');
    //图片列表
    Route::get('/photo_list', 'Home\IndexController@photo');
    //文章列表
    Route::get('/article_list', 'Home\IndexController@article2');

    Route::get('/', 'Home\IndexController@index');
    Route::get('/cate/{cate_id}', 'Home\IndexController@cate');
    Route::get('/a/{art_id}', 'Home\IndexController@article');
});



/*登录路由*/
Route::group([],function(){
    Route::any('admin/login','Admin\LoginController@login');
    Route::get('admin/code','Admin\LoginController@code');
    Route::get('admin/crypt','Admin\LoginController@crypt');
    Route::get('admin/test','Admin\LoginController@test');
});

/*后台路由*/
Route::group(['middleware'=>'admin.login','prefix'=>'admin','namespace'=>'Admin'],function() {
    Route::get('/', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'IndexController@quit');
    Route::any('pass', 'IndexController@pass');

    /*商品分类管理*/
    Route::post('sort/changeOrder', 'GoodsSortController@changeOrder');
    Route::resource('goodsSort','GoodsSortController');

    /*分类管理*/
    Route::post('cate/changeOrder', 'CategoryController@changeOrder');
    Route::resource('category', 'CategoryController');


    /*用户管理*/
    Route::resource('user', 'UserController');
    //用户密码修改
    Route::get('user/{user_id}/password', 'UserController@password');
    Route::put('user/{user_id}/password', 'UserController@password_edit');

    /*留言模块*/
    Route::resource('message', 'MessageController');

    /*文章管理*/
    Route::resource('article', 'ArticleController');

    /*友情链接*/
    Route::post('links/changeOrder', 'LinksController@changeOrder');
    Route::resource('links', 'LinksController');

    /*自定义导航*/
    Route::post('navs/changeOrder', 'NavsController@changeOrder');
    Route::resource('navs', 'NavsController');

    /*站点配置*/
    Route::get('config/putfile', 'ConfigController@putFile');
    Route::post('config/changeContent', 'ConfigController@changeContent');
    Route::post('config/changeOrder', 'ConfigController@changeOrder');
    Route::resource('config', 'ConfigController');

    /*上传*/
    Route::resource('upload', 'CommonController@upload');
});