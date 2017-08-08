@section('title')
    我购买的主机
@stop
@include('header')
@include('nav')

@if(Auth::user())
    <section class="container grid-960">
        <div class="container">
            <div class="columns">
                <div class="column col-3 col-md-12">
                    @include("sidebar")
                </div>
                <div class="column col-9 col-md-12">
                    <div class="item-title">
                        您购买的虚拟主机共 <b>{{Auth::user()->host->count()}}</b> 个，其中<b> <?php echo Auth::user()->host->count()-Auth::user()->host->where("valid","=",0)->count();?></b> 个已开通
                    </div>

                    @foreach($hosts as $hostinfo)

                        <div class="column col-4 col-md-12 my_host_item">

                        <span class="tooltip big-font tooltip-right" data-tooltip="{{$hostinfo->model}}"><?php $good = App\Good::whereRaw("model='".$hostinfo->model."'")->get(); echo $good[0]->name ?? "已下架";?></span>

                        <div class="status">
                                @if($hostinfo->valid==1)
                                    <p style="color: #4CAF50">正常运行</p>
                                @elseif($hostinfo->valid==0)
                                    <p style="color: #607D8B">尚未开通</p>
                                @elseif($hostinfo->valid==2)
                                    <p style="color: #FF9800">暂停服务</p>
                                @else
                                    <p style="color: #FF5722">服务过期</p>
                                @endif
                        </div>

                            <p>网站账户：<small>{{$hostinfo->host_name}}</small></p>
                            <p>默认密码：<small>{{$hostinfo->host_pass}}</small></p>
                            <p>有效期至：<small>{{$hostinfo->end_at}}</small></p>
                            @if($hostinfo->valid!=0)
                                <div class="input-group input-inline host-btn-panel">
                                    <a class="btn btn-link" href="/my_host/panel/{{$hostinfo->host_panel}}">进入控制面板</a>
                                    {!!  Form::open(['url'=>'/my_host/renew']) !!}
                                        {!! Form::hidden('id',base64_encode($hostinfo->id)) !!}
                                        {!! Form::submit('续费',["class"=>"btn btn-link","style"=>"display:inline"]) !!}
                                    {!!  Form::close() !!}
                                </div>
                            @endif

                        </div>
                    @endforeach

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