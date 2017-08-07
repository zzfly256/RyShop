@include('admin.if')
@section('title')
    用户 {{$user->name}} 全部虚拟主机列表
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
                <div class="item-title">
                    用户名：<a href="/admin/users/{{$user->id}}/edit" style="color:#aaa">{{$user->name}}</a>，虚拟主机共 <b>{{$user->host->count()}}</b> 个，其中<b> <?php echo $user->host->count()-$user->host->where("valid",'=',"0")->count();?></b> 个已开通
                </div>
                @foreach($hosts as $hostinfo)
                    <div class="order-item">
                        <span class="big-font"><?php $good = App\Good::whereRaw("model='".$hostinfo->model."'")->get(); echo $good[0]->name ?? "已下架";?><small class="model-label"><small>{{$hostinfo->model}}</small></small>
                        </span>
                        <br>
                        <span>状态：
                            @if($hostinfo->valid==1)
                                <div class="inline" style="color: #4CAF50">正常</div>
                            @elseif($hostinfo->valid==0)
                                <div class="inline" style="color: #607D8B">未开通</div>
                            @elseif($hostinfo->valid==2)
                                <div class="inline"style="color: #FF9800">暂停</div>
                            @else
                                <div class="inline"style="color: #FF5722">过期</div>
                            @endif
                            </span>
                        <span>有效期至：{{$hostinfo->end_at}}</span>
                        <br>
                        <span>网站账户：<small>{{$hostinfo->host_name}}</small></span>
                        <span>默认密码：<small>{{$hostinfo->host_pass}}</small></span>
                        <br>
                        <span><a href="/my_host/panel/{{$hostinfo->host_panel}}">进入控制面板</a></span>


                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

@include('footer')