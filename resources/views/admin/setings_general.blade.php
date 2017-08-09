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


                    {!!  Form::model($setings[0],['url'=>'/admin/setings/'.$setings[0]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                        <div class="form-group">
                            <div class="col-2">
                            {!! Form::label('站点名称',null,["class"=>"form-label"]) !!}
                            </div>
                            <div class="col-8">
                                {!! Form::text('value',$setings[0]->value,["class"=>"form-input"]) !!}
                            </div>
                            <div class="col-2">
                                {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                            </div>
                        </div>
                    {!!  Form::close() !!}

                    {!!  Form::model($setings[12],['url'=>'/admin/setings/'.$setings[12]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('站点域名',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::text('value',$setings[12]->value,["class"=>"form-input"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    {!!  Form::close() !!}

                    <li class="divider" data-content="SEO设置">
                    </li>

                    {!!  Form::model($setings[1],['url'=>'/admin/setings/'.$setings[1]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('站点关键字',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::text('value',$setings[1]->value,["class"=>"form-input"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    {!!  Form::close() !!}

                    {!!  Form::model($setings[2],['url'=>'/admin/setings/'.$setings[2]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('站点描述',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::text('value',$setings[2]->value,["class"=>"form-input"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    {!!  Form::close() !!}

                    <li class="divider" data-content="服务条款">
                    </li>

                    {!!  Form::model($setings[3],['url'=>'/admin/setings/'.$setings[3]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('服务条款',null,["class"=>"form-label"]) !!}
                            <small>支持HTML</small>
                        </div>
                        <div class="col-8">
                            {!! Form::textarea('value',$setings[3]->value,["class"=>"form-input"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    {!!  Form::close() !!}

                    <li class="divider" data-content="推介设置">
                    </li>

                    {!!  Form::model($setings[9],['url'=>'/admin/setings/'.$setings[9]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('佣金比例',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::text('value',$setings[9]->value,["class"=>"form-input"]) !!}
                        </div>
                        <div class="col-2">
                            {!! Form::submit('保存',["class"=>"btn","style"=>"margin-left:25px"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-2">

                        </div>
                        <div class="col-8">
                            <small>佣金比例为 0 ~ 1 之间的小数，被推介的用户成功开通产品后将会获得此比例的佣金</small>
                        </div>
                        <div class="col-2">

                        </div>
                    </div>
                    {!!  Form::close() !!}

                    {!!  Form::model($setings[10],['url'=>'/admin/setings/'.$setings[10]->id,'method'=>'PATCH','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="col-2">
                            {!! Form::label('最低提现',null,["class"=>"form-label"]) !!}
                        </div>
                        <div class="col-8">
                            {!! Form::text('value',$setings[10]->value,["class"=>"form-input"]) !!}
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