@section('title')
    登录
    @stop
@extends('header')

<div class="card login-panel">
    <h4>登录 <small class="label"><small>RyShop</small></small></h4>
    {!!  Form::open(['url'=>'/auth/login']) !!}
    <div class="form-group">
        {!! Form::label('邮箱',null,["class"=>"form-label"]) !!}
        {!! Form::text('email',null,["class"=>"form-input"]) !!}

    {!! Form::label('密码',null,["class"=>"form-label"]) !!}
    {!! Form::password('password',["class"=>"form-input"]) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('登录',["class"=>"btn btn-default"]) !!}
    <a href="/auth/register" class="btn btn-link">注册</a>
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

@extends('footer')