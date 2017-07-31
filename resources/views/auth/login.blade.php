@section('title')
    登录
    @stop
@include('header')
<body style="background: rgba(241, 241, 241, 0.73);">
    <div class="card login-panel">
        <h4>登录 <small class="label"><small>{{\App\Setings::whereRaw("name='siteName'")->first()->value}}</small></small></h4>
        {!!  Form::open(['url'=>'/auth/login']) !!}
        <div class="form-group">
            {!! Form::label('邮箱',null,["class"=>"form-label"]) !!}
            {!! Form::text('email',null,["class"=>"form-input"]) !!}

        {!! Form::label('密码',null,["class"=>"form-label"]) !!}
        {!! Form::password('password',["class"=>"form-input"]) !!}
        </div>
        <div class="form-group" style="margin-top: 20px;">
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
@include('footer')