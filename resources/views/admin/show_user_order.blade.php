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
                    用户名：<a href="/admin/users/{{$user->id}}/edit" style="color:#aaa">{{$user->name}}</a>，订单共 <b>{{$user->order->count()}}</b> 个
                    <a href="/admin/order/user/{{$user->id}}/unpaid" class="new_ticket_btn"> 未支付（{{\App\User::find($user->id)->order()->whereRaw("payout='0'")->count()}}）</a>
                    <a href="/admin/order/user/{{$user->id}}/paid" class="new_ticket_btn"> 已支付（{{\App\User::find($user->id)->order()->whereRaw("payout='1'")->count()}}）</a>

                </div>
               @foreach($order as $orderinfo)
                   <div class="order-item">
                    <span class="big-font"><?php $good = App\Good::whereRaw("model='".$orderinfo->model."'")->get(); echo $good[0]->name ?? "已下架";?><small class="model-label"><small>{{$orderinfo->model}}</small></small>
                    </span>
                       <br>
                       <span>有效期至：{{$orderinfo->end_at}}</span>
                       <br>
                       <span>订单号：<a href="/admin/order/{{$orderinfo->no}}">{{$orderinfo->no}}</a></span>
                       <span>支付金额：{{$orderinfo->price}}</span>
                       <span>支付状态：<?php if($orderinfo->payout==1){echo '<label class="label label-success">成功</label>';}else{echo '<label class="label label-warning">未支付</label>';}?></span>

                   </div>
               @endforeach
                {!! $order->render() !!}
            </div>
        </div>
    </div>

</section>

@include('footer')