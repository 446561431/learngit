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
Route::get('/power', function(){
	echo 'asdsdas';
	//return view('power/index');
});

/**
*	会员管理  控制器为  VipController.php 
*/
Route::get('/vip', function(){
	return view('vip/list');
});
Route::get('/viprank', function(){
	return view('vip/rank');
});



/**
*	地区管理 控制器为 AreaController.php
*/
Route::get('/area', function(){
	return view('area/list');
});

Route::get('/addarea', function(){
	return view('area/addarea');
});


/**
*	分类管理 控制器为 TypeController.php
*/

Route::get('/consume', function(){
	return view('type/consume');	//消费分类
});
Route::get('/job', function(){
	return view('type/job');	//兼职分类
});

/**
*	门店管理 控制器为	ShopController.php
*/
Route::get('/shop', function(){
	return view('shop/list');
});

Route::get('/addshop', function(){
	return view('shop/addshop');
});


/**
*	订单管理 控制器为 OrderContrller.php
*/
Route::get('/oldorder', function(){
	
	return view('order/oldorder');
});

Route::get('/neworder', function(){
	
	return view('order/neworder');
});










