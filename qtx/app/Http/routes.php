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

/**
*	会员管理  控制器为  VipController.php 
*/
Route::get('/vip','VipController@index');
Route::get('/rank','VipController@rank');

/**
*	地区管理 控制器为 AreaController.php
*/
Route::get('/area','AreaController@index');
Route::get('/addarea','AreaController@addarea');



/**
*	分类管理 控制器为 TypeController.php
*/

Route::get('/consume','TypeController@consume');
Route::get('/job','TypeController@job');

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
//return view('order/neworder');









