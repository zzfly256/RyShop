@section('title')
    我的推广
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
                    <div class="card user-info">
                        <div class="empty">
                            <div class="empty-icon">
                                <i class="icon icon-people"></i>
                            </div>
                            <h4 class="empty-title">{{Auth::user()->name}}  <small><small><small>UID:{{Auth::user()->id}}</small></small></small></h4>
                            <p class="empty-subtitle">您推介成功的订单共 <b>{{count($order)}}</b> 个，账户余额<button class="btn btn-link tooltip tooltip-right" @if(Auth::user()->amount<50) data-tooltip="超过50元可以提现哦！" @else data-tooltip="您可以提交工单联系管理员提现" @endif>￥{{Auth::user()->amount}}</button></p>

                            <p class="empty-subtitle">您的专属推广链接：{{'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]}}/{{Auth::user()->id}}</p>
                        </div>
                    </div>

                    @foreach($order as $orderinfo)
                        <div class="order-item">
                        <span class="big-font"><?php $good = App\Good::whereRaw("model='".$orderinfo->model."'")->get(); echo $good[0]->name ?? "已下架";?><small class="model-label"><small>{{$orderinfo->model}}</small></small>
                        </span>
                            <br>
                            <span>订单号：{{$orderinfo->no}}</span>
                            <span>支付金额：{{$orderinfo->price}}</span>
                            <span>您的佣金：{{$orderinfo->price/10}}</span>

                        </div>
                    @endforeach
                    <div class="host-tips toast" @if(count($order)) style="margin-top:10px;" @endif>
                        {!! \App\Setings::whereRaw("name='ticket_text'")->first()->value !!}
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