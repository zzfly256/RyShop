@section('title')
    {{$tic->title}} 工单回复
@stop
@include('header')
@include('nav')

@if(Auth::user())
    <section class="container grid-960">
        <div class="container">
            <div class="columns">
                <div class="column col-3 col-md-12">
                    @include("admin.sidebar")
                </div>
                <div class="column col-9 col-md-12">

                    <div class="padding-30 card ticket-content">
                        <h4>
                            {{$tic->title}}
                            <small class="float-right">
                                <small>
                                    @if($tic->valid=="1")
                                        <div class="inline" style="color: #4CAF50">有效</div>
                                    @else
                                        <div class="inline" style="color: #607D8B">已关闭</div>
                                    @endif
                                </small>
                            </small>
                        </h4>
                        <hr>
                        {!! $tic->content !!}

                        {!!  Form::open(['url'=>'/my_ticket/'.$tic->id.'/reply','method'=>'PATCH']) !!}
                        <div class="form-group">
                            {!! Form::label('正文（支持HTML）',null,["class"=>"form-label"]) !!}
                            {!! Form::textarea('content',null,["class"=>"form-input"]) !!}
                        </div>
                        <div class="form-group" style="margin-top: 20px;">
                            {!! Form::submit('回复',["class"=>"btn btn-default"]) !!}
                        </div>
                        {!!  Form::close() !!}

                    </div>


                </div>

            </div>
        </div>
    </section>
@else
    <section class="container grid-960">
        <div class="card user-info">
            <div class="empty">
                <div class="empty-icon">
                    <i class="icon icon-people"></i>
                </div>
                <h4 class="empty-title">您还没有登录</h4>
                <p class="empty-subtitle">您还没有登录系统，请登录之后再进行操作哦！</p>
                <div class="empty-action">
                    <a href="/auth/login" class="btn btn-primary">登录</a>
                    <a href="/auth/resigter" class="btn">注册</a>
                </div>
            </div>
        </div>
    </section>

@endif
@include('footer')