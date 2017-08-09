<?php
// 物品管理
resource('/host','GoodController');
get('/host/{model}','GoodController@show');

// 主页
get('/','GoodController@single_index');

// 用户模块
get('/auth/login','Auth\AuthController@getLogin');
post('/auth/login','Auth\AuthController@postLogin');
get('/auth/register','Auth\AuthController@getRegister');
post('/auth/register','Auth\AuthController@postRegister');
get('/auth/logout','Auth\AuthController@getLogout');

// 前台用户中心
get('/home','AdminController@user_home');
get('/home/edit','AdminController@user_front_edit');
patch('/home','AdminController@user_front_update');

// 新闻公告
get('/news','newsController@user_index');
get('/news/{id}','newsController@user_details');

// aff模块
get('/aff','AffController@index');
get('/aff/{id}','AffController@access');

// 管理员面板
get('/admin','AdminController@host_index');
get('/install','AdminController@install');
post('/install','AdminController@initial');
// 主机（母机）部分
get('/admin/host','AdminController@host_index');
get('/admin/host/add','GoodController@create');
post('/admin/host/add','GoodController@store');
get('/admin/host/{id}/edit','GoodController@edit');
delete('/admin/host/{id}','GoodController@destroy');
patch('/admin/host/{id}','GoodController@update');
// 用户部分
get('/admin/users','AdminController@users_index');
delete('/admin/users/{id}','AdminController@user_destroy');
get('/admin/users/{id}/edit','AdminController@user_edit');
patch('/admin/users/{id}','AdminController@user_update');
// 设置部分
get('/admin/setings/general','AdminController@setings_general');
get('/admin/setings/theme','AdminController@setings_theme');
get('/admin/setings/server','AdminController@setings_server');
patch('/admin/setings/{id}','AdminController@setings_update');
// aff
get('/admin/aff/{id}','AffController@admin_user_index');
// 新闻公告
get('/admin/news','newsController@admin_index');
get('/admin/news/add','newsController@create');
post('/admin/news/add','newsController@store');
get('/admin/news/{id}/edit','newsController@edit');
patch('/admin/news/{id}','newsController@update');
delete('/admin/news/{id}','newsController@destroy');

// 订单模块
post('/order/new','OrderController@new_store');
post('/order/new/result','OrderController@new_result');
get('/my_order','OrderController@show_mine');
get('/my_order/paid','OrderController@my_paid');
get('/my_order/unpaid','OrderController@my_unpaid');
get('/admin/order','AdminController@orders_index');
get('/admin/order/paid','OrderController@show_paid');
get('/admin/order/unpaid','OrderController@show_unpaid');
get('/admin/order/{no}','OrderController@order_show');
get('/order/{no}','OrderController@order_front_show');
get('/admin/order/user/{id}','OrderController@show_user');
get('/admin/order/user/{id}/paid','OrderController@admin_user_paid');
get('/admin/order/user/{id}/unpaid','OrderController@admin_user_unpaid');
delete('/admin/order/{no}','OrderController@destroy');
// 续费部分
post('/my_host/renew','OrderController@renew');
post('/order/renew','OrderController@renew_store');
post('/order/renew/result','OrderController@renew_result');

//虚拟主机部分
get('/admin/vhost','HostController@index');
get('/admin/vhost/user/{id}','HostController@show_user');
get('/my_host','HostController@show_mine');
post('/admin/vhost/{id}','HostController@change_status');
delete('admin/vhost/{id}','HostController@delete_host');

// 工单系统
get('/my_ticket','TicketController@front_index');
get('/my_ticket/open','TicketController@front_open');
get('/my_ticket/closed','TicketController@front_closed');
get('/my_ticket/new','TicketController@create');
post('/my_ticket/new','TicketController@store');
get('/my_ticket/{id}','TicketController@front_show');
get('/my_ticket/{id}/reply','TicketController@front_reply');
patch('/my_ticket/{id}/reply','TicketController@user_update');
get('/admin/tickets','TicketController@admin_index');
get('/admin/tickets/open','TicketController@admin_open');
get('/admin/tickets/closed','TicketController@admin_closed');
get('/admin/tickets/{id}','TicketController@admin_show');
get('/admin/tickets/{id}/reply','TicketController@admin_reply');
patch('/admin/tickets/{id}/reply','TicketController@admin_update');
patch('/admin/tickets/{id}','TicketController@admin_turn_off');
delete('/admin/tickets/{id}','TicketController@destroy');
patch('/my_ticket/{id}','TicketController@user_turn_off');
get('/admin/tickets/user/{id}','TicketController@user_show');
get('/admin/tickets/user/{id}/open','TicketController@user_open');
get('/admin/tickets/user/{id}/closed','TicketController@user_closed');