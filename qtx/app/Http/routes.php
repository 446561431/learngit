<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/**
*		登陆注册功能路由 控制器为 LoginController.php 
*/
Route::get('/', function(){
	return view('login/login');
});


/**
*	权限管理 控制器名称为 PowerController.php 
*/
Route::get('/power','PowerController@index');
Route::get('/powerdel/id={id}','PowerController@del');
Route::get('/powerup&id={id}','PowerController@uplist');
Route::post('/powerupdate','PowerController@update');
Route::get('/poweraddform',function(){
    return view('power.add');
});
Route::post('/poweradd','PowerController@add');
Route::get('/rolelist', 'PowerController@rolelist');
Route::get('/roleaddform', function(){
    return view('power.roleadd');
});
Route::post('/roleadd','PowerController@roleadd');
Route::get('/roledel/id={id}', 'PowerController@roledel');
Route::get('/roleup&id={id}', 'PowerController@roleup');
Route::post('/roleupdate','PowerController@roleupdate');


/**
*	会员管理  控制器为  VipController.php 
*/
Route::get('/vip','VipController@index');
Route::get('/vipdel','VipController@vipdel');
Route::get('/vipupdate','VipController@vipupdate');
Route::post('/vipfrom','VipController@vipfrom');
Route::get('/vipinsert','VipController@vipinsert');
Route::post('/vipinsertfrom','VipController@vipinsertfrom');
Route::get('/rank','VipController@rank');
Route::get('/company','VipController@company');
Route::get('/companydel','VipController@companydel');


/**
*	地区管理 控制器为 AreaController.php
*/
Route::get('/area','AreaController@index');
Route::get('/addarea','AreaController@addarea');
Route::get('/del_area','AreaController@del_area');
Route::post('/insertarea','AreaController@insertarea');



/**
*	分类管理 控制器为 TypeController.php
*/

Route::group(['prefix' => ''], function () {
    Route::get('/typeconsume','TypeController@consume');
    Route::get('/typejob','TypeController@job');
    Route::get('/typeindex','TypeController@index');
    Route::get('/typelistdel','TypeController@xiaodel');
    Route::get('/typeupdate','TypeController@updatelist');
    Route::post('/typepost','TypeController@updatepost');
    Route::get('/typeaddlist',function(){
        return view('type.addlist');
    });
    Route::post('/typeaddbuy','TypeController@addbuy');
});



/**
*	门店管理 控制器为	ShopController.php
*/
Route::get('/shop','ShopController@index');
Route::get('/addshop','ShopController@addshop');


/**
*	订单管理 控制器为 OrderController.php
*/
Route::get('/oldorder','OrderController@oldorder');
Route::get('/neworder','OrderController@neworder');
Route::get('/orderupdate','OrderController@up');
Route::get('/orderdel','OrderController@del');
Route::get('/noorder','OrderController@noorder');
Route::get('/yisearch','OrderController@yisearch');
Route::get('/weisearch','OrderController@weisearch');

//return view('order/neworder');









