@section('title')
    注册
@stop
@extends('header')

<div class="card login-panel">
    <h4>登录 <small class="label"><small>RyShop</small></small></h4>
    {!!  Form::open(['url'=>'/auth/register']) !!}
    <div class="form-group">
        {!! Form::label('用户名',null,["class"=>"form-label"]) !!}
        {!! Form::text('name',null,["class"=>"form-input"]) !!}
        {!! Form::label('邮箱',null,["class"=>"form-label"]) !!}
        {!! Form::text('email',null,["class"=>"form-input"]) !!}
        {!! Form::label('密码',null,["class"=>"form-label"]) !!}
        {!! Form::password('password',["class"=>"form-input"]) !!}
        {!! Form::label('确认密码',null,["class"=>"form-label"]) !!}
        {!! Form::password('password_confirmation',["class"=>"form-input"]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('注册',["class"=>"btn btn-default"]) !!}
        <a href="/auth/login" class="btn btn-link">返回登录</a>
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