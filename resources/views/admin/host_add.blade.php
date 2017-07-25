@include('admin.if')
@section('title')
    添加主机产品
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
                <div class="padding-30 card">
                {!!  Form::open(['url'=>'/admin/host/add']) !!}
                <div class="form-group">
                    {!! Form::label('名称',null,["class"=>"form-label"]) !!}
                    {!! Form::text('name',null,["class"=>"form-input"]) !!}
                    {!! Form::label('型号',null,["class"=>"form-label"]) !!}
                    {!! Form::text('model',null,["class"=>"form-input"]) !!}
                    {!! Form::label('价格（年付）',null,["class"=>"form-label"]) !!}
                    {!! Form::text('price',null,["class"=>"form-input"]) !!}
                    {!! Form::label('简洁描述（支持HTML）',null,["class"=>"form-label"]) !!}
                    {!! Form::textarea('description',null,["class"=>"form-input","rows"=>"3"]) !!}
                    {!! Form::label('详细页描述（支持HTML）',null,["class"=>"form-label"]) !!}
                    {!! Form::textarea('details',null,["class"=>"form-input"]) !!}
                    {!! Form::label('对接模块',null,["class"=>"form-label"]) !!}
                    {!! Form::select('panel', ['ep1'=>'EasyPanel 1'],"ep1",["class"=>"form-input"]) !!}
                </div>
                <div class="form-group" style="margin-top: 20px;">
                    {!! Form::submit('添加',["class"=>"btn btn-default"]) !!}
                </div>
                {!!  Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</section>

@include('footer')