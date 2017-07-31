<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RyShop 安装程序</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="card login-panel">
    <h4>欢迎使用 RyShop <small class="label"><small>安装程序</small></small></h4>
    {!!  Form::open(['url'=>'/install']) !!}

    <?php
    $dir = explode("storage",__DIR__);
    $eni = php_uname('s').' '.php_uname('r').' - PHP '.PHP_VERSION;
    ?>
    <div class="form-group">
        {!! Form::label('站点名称*',null,["class"=>"form-label"]) !!}
        {!! Form::text('site',null,["class"=>"form-input"]) !!}
        {!! Form::label('程序路径*',null,["class"=>"form-label"]) !!}
        {!! Form::text('url',$dir[0],["class"=>"form-input","disabled"=>"disabled"]) !!}
        {!! Form::label('运行环境*',null,["class"=>"form-label"]) !!}
        {!! Form::text('ver',$eni,["class"=>"form-input","disabled"=>"disabled","style"=>"margin-bottom:15px"]) !!}

        <hr>
        {!! Form::label('用户名*',null,["class"=>"form-label"]) !!}
        {!! Form::text('name',null,["class"=>"form-input"]) !!}
        {!! Form::label('邮箱*',null,["class"=>"form-label"]) !!}
        {!! Form::text('email',null,["class"=>"form-input"]) !!}
        {!! Form::label('QQ*',null,["class"=>"form-label"]) !!}
        {!! Form::text('qq',null,["class"=>"form-input"]) !!}
        {!! Form::label('密码*',null,["class"=>"form-label"]) !!}
        {!! Form::password('password',["class"=>"form-input"]) !!}
    </div>
    <div class="form-group" style="margin-top: 20px;">
        {!! Form::submit('安装',["class"=>"btn btn-default"]) !!}
    </div>
    {!!  Form::close() !!}
    @if($errors->any())
        <div class="toast toast-primary">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
</div>
</body>
<!--
    Author: Rytia
    Blog: www.zzfly.net
    Github: github.com/zzfly256/RyShop
-->
