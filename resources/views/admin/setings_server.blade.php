@include('admin.if')
@section('title')
    常规设置
@stop
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
                    <table class="table table-striped table-hover" style="margin-bottom:20px;">
                        <thead>
                        <tr>
                            <th>对接模块</th>
                            <th>IP地址</th>
                            <th>登陆地址</th>
                            <th>识别情况</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($server as $item)

                                <tr>
                                    <td>{{$item["name"]}}</td>
                                    <td>{{$item["ip"]}}</td>
                                    <td>{{$item["panel"]}}</td>
                                    <td>
                                        @if($item["status"]==0)
                                            未识别
                                        @else
                                            已识别
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                    <li class="divider" data-content="邮件服务器设置">
                    </li>
                    {!!  Form::model($setings[13],['url'=>'/admin/setings/'.$setings[13]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('SMTP服务器',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::text('value',$setings[13]->value,["class"=>"form-input"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    {!!  Form::close() !!}

                    {!!  Form::model($setings[14],['url'=>'/admin/setings/'.$setings[14]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('SMTP端口',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::text('value',$setings[14]->value,["class"=>"form-input"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    {!!  Form::close() !!}

                    {!!  Form::model($setings[15],['url'=>'/admin/setings/'.$setings[15]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('SMTP用户名',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::text('value',$setings[15]->value,["class"=>"form-input"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    {!!  Form::close() !!}

                    {!!  Form::model($setings[16],['url'=>'/admin/setings/'.$setings[16]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('SMTP密码',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::password('value',["class"=>"form-input","placeholder"=>"密码非修改请勿填写"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    {!!  Form::close() !!}

                    {!!  Form::model($setings[17],['url'=>'/admin/setings/'.$setings[17]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('邮件地址',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::text('value',$setings[17]->value,["class"=>"form-input"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    {!!  Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</section>

@include('footer')