@include('admin.if')
@section('title')
    发布新闻公告
@stop
@include('header')
@include('nav')
<section class="container grid-960">
    <div class="container">
        <div class="columns">
            <div class="column col-3 col-md-12">
                @include("admin.sidebar")
            </div>
            <?php
                $user_list = [];
                foreach ($user as $user_value)
                {
                    if($user_value->level==0):
                    $user_list = array_merge($user_list,[ "$user_value->name"=>$user_value->name]);
                    endif;
                }

            ?>
            <div class="column col-9 col-md-12">
                <div class="padding-30 card">
                    {!!  Form::open(['url'=>'/admin/news/add']) !!}
                    <div class="form-group">
                        {!! Form::label('标题',null,["class"=>"form-label"]) !!}
                        {!! Form::text('title',null,["class"=>"form-input"]) !!}
                        {!! Form::label('发布者',null,["class"=>"form-label"]) !!}
                        {!! Form::select('user',$user_list,Auth::user()->id,["class"=>"form-input"]) !!}
                        {!! Form::label('简洁描述（支持HTML）',null,["class"=>"form-label"]) !!}
                        {!! Form::textarea('description',null,["class"=>"form-input","rows"=>"3"]) !!}
                        {!! Form::label('正文内容（支持HTML）',null,["class"=>"form-label"]) !!}
                        {!! Form::textarea('content',null,["class"=>"form-input"]) !!}
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        {!! Form::submit('发布',["class"=>"btn btn-default"]) !!}
                    </div>
                    {!!  Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</section>

@include('footer')