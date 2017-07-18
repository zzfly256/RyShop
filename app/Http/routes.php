<?php
// 物品管理
resource('/good','GoodController');

// 主页
get('/','GoodController@index');

// 用户管理
get('/auth/login','Auth\AuthController@getLogin');
post('/auth/login','Auth\AuthController@postLogin');
get('/auth/register','Auth\AuthController@getRegister');
post('/auth/register','Auth\AuthController@postRegister');
get('/auth/logout','Auth\AuthController@getLogout');

// 管理员面板
get('/admin','AdminController@host_index');
get('/admin/host','AdminController@host_index');
get('/admin/users','AdminController@users_index');
delete('admin/users/{id}','AdminController@user_destroy');
get('admin/users/{id}/edit','AdminController@user_edit');
patch('admin/users/{id}','AdminController@user_update');