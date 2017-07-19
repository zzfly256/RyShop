@section('title')
    用户编辑
@stop
@include('admin.if')
@include('header')
@include('nav')
<section class="container grid-960">
    <div class="container">
        <div class="columns">
            <div class="column col-3 col-md-12">
                @include("admin.sidebar")
            </div>
            <div class="column col-9 col-md-12">
                <div class="padding-30">
                {!!  Form::model($user,['url'=>'/admin/users/'.$user->id,'method'=>'PATCH']) !!}

                {!! Form::label('用户名',null,["class"=>"form-label"]) !!}
                {!! Form::text('name',$user->name,["class"=>"form-input"]) !!}

                {!! Form::label('密码',null,["class"=>"form-label"]) !!}
                {!! Form::text('the_password',null,["class"=>"form-input","placeholder"=>"密码非修改请勿填写"]) !!}

                {!! Form::label('用户权限',null,["class"=>"form-label"]) !!}
                {!! Form::select('level', ['0'=>'管理员','1'=>'普通用户'], $user->level,["class"=>"form-select"]) !!}

                {!! Form::label('邮箱',null,["class"=>"form-label"]) !!}
                {!! Form::text('email',$user->email,["class"=>"form-input"]) !!}

                {!! Form::label('QQ',null,["class"=>"form-label"]) !!}
                {!! Form::text('qq',$user->qq,["class"=>"form-input"]) !!}

                {!! Form::submit('保存',["class"=>"btn","style"=>"margin-top:10px"]) !!}
                {!!  Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</section>

@include('footer')