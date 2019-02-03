<?php
require __DIR__.'/../vendor/autoload.php';
use \System\Http\Route;
use \System\Http\Request;
use \System\Http\Response;

/**
 * PHP-QuickORM
 *
 * @description: a simple PHP ORM framework to built up an api server
 * @author: Rytia
 */

// 此为测试环境启动器，无需伪静态规则即可运行
// 如果您已将产品真正投入使用，请将您的工作目录设置为 /Public，方便与静态文件的统一管理

// 启动相应函数
require_once __DIR__ . "/../vendor/php-quickorm/framework/System/Utility/Functions.php";

// 设置错误与异常处理
set_error_handler('\System\Utility\Exception::errorReport');
set_exception_handler('\System\Utility\Exception::exceptionReport');

// 启动路由系统处理请求
Route::initialize(new Request(), new Response(), true);
