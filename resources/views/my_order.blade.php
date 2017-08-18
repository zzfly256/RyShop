@section('title')
    我的订单
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
                   您的订单共 <b>{{Auth::user()->order->count()}}</b> 个
                    <a href="/my_order/unpaid" class="new_ticket_btn"> 未支付（{{Auth::user()->order()->whereRaw("payout='0'")->count()}}）</a>
                    <a href="/my_order/paid" class="new_ticket_btn"> 已支付（{{Auth::user()->order()->whereRaw("payout='1'")->count()}}）</a>
                </div>
                @foreach($order as $orderinfo)
                    <div class="order-item">
                        <span class="big-font"><?php $good = App\Good::whereRaw("model='".$orderinfo->model."'")->get(); if(empty($good[0]->name)){echo "已下架";}else{echo $good[0]->name;}?><small class="model-label"><small>{{$orderinfo->model}}</small></small>
                        </span>
                        <br>
                        <span>有效期至：{{$orderinfo->end_at}}</span>
                        <br>
                        <span>订单号：<a href="/order/{{$orderinfo->no}}">{{$orderinfo->no}}</a></span>
                        <span>支付金额：{{$orderinfo->price}}</span>
                        <span>支付状态：<?php if($orderinfo->payout==1){echo '<label class="label label-success">成功</label>';}else{echo '<label class="label label-warning">未支付</label>';}?></span>

                    </div>
                @endforeach
                {!! $order->render() !!}
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