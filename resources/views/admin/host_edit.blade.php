@include('admin.if')
@section('title')
    编辑虚拟主机
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
                    {!!  Form::model($good,['url'=>'/admin/host/'.$good->id,'method'=>'PATCH']) !!}

                    {!! Form::label('名称',null,["class"=>"form-label"]) !!}
                    {!! Form::text('name',$good->name,["class"=>"form-input"]) !!}

                    {!! Form::label('型号',null,["class"=>"form-label"]) !!}
                    {!! Form::text('model',$good->model,["class"=>"form-input","placeholder"=>"密码非修改请勿填写"]) !!}

                    {!! Form::label('价格（年付）',null,["class"=>"form-label"]) !!}
                    {!! Form::text('price',$good->price,["class"=>"form-input"]) !!}

                    {!! Form::label('简洁描述',null,["class"=>"form-label"]) !!}
                    {!! Form::textarea('description',$good->description,["class"=>"form-input","rows"=>"3"]) !!}

                    {!! Form::label('详情页描述',null,["class"=>"form-label"]) !!}
                    {!! Form::textarea('details',$good->details,["class"=>"form-input"]) !!}

                    {!! Form::label('对接模块',null,["class"=>"form-label"]) !!}
                    {!! Form::select('panel', ['ep1'=>'EasyPanel 1'],"ep1",["class"=>"form-input"]) !!}

                    {!! Form::submit('保存',["class"=>"btn","style"=>"margin-top:10px"]) !!}
                    {!!  Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</section>

@include('footer')