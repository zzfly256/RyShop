<?php
// 物品管理
resource('/host','GoodController');
get('/host/{model}','GoodController@show');

// 主页
get('/','GoodController@index');

// 用户模块
get('/auth/login','Auth\AuthController@getLogin');
post('/auth/login','Auth\AuthController@postLogin');
get('/auth/register','Auth\AuthController@getRegister');
post('/auth/register','Auth\AuthController@postRegister');
get('/auth/logout','Auth\AuthController@getLogout');

// 前台用户管理
get('/auth/home/{id}','AdminController@user_home');
get('/auth/home/{id}/edit','AdminController@user_front_edit');
patch('/auth/home/{id}','AdminController@user_front_update');

// 管理员面板
get('/admin','AdminController@host_index');
// 主机部分
get('/admin/host','AdminController@host_index');
get('/admin/host/add','GoodController@create');
post('/admin/host/add','GoodController@store');
get('/admin/host/{id}/edit','GoodController@edit');
delete('admin/host/{id}','GoodController@destroy');
patch('admin/host/{id}','GoodController@update');
// 用户部分
get('/admin/users','AdminController@users_index');
delete('admin/users/{id}','AdminController@user_destroy');
get('admin/users/{id}/edit','AdminController@user_edit');
patch('admin/users/{id}','AdminController@user_update');

// 订单模块
post('/order','OrderController@store');
post('/order/result','OrderController@result');