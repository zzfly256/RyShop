@include('admin.if')
@section('title')
    用户 {{$user->name}} 全部订单列表
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
                    用户名：<a href="/admin/users/{{$user->id}}/edit" style="color:#aaa">{{$user->name}}</a>，推介成功的订单共 <b>{{$aff->count()}}</b> 个

                </div>
                @foreach($aff as $orderinfo)
                    <div class="order-item">
                        <span class="big-font"><?php $good = App\Good::whereRaw("model='".$orderinfo->model."'")->get(); echo $good[0]->name ?? "已下架";?><small class="model-label"><small>{{$orderinfo->model}}</small></small>
                        </span>
                        <br>
                        <span>订单号：{{$orderinfo->no}}</span>
                        <span>支付金额：{{$orderinfo->price}}</span>
                        <span>佣金：{{$orderinfo->price/10}}</span>

                    </div>
                @endforeach

            </div>
        </div>
    </div>

</section>

@include('footer')