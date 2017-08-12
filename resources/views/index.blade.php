@section('title')
    Host in Pocket
@stop
@include('header')
@include('nav')

<section class="container grid-960">
    <div class="container">
        @if(!empty(\App\Setings::whereRaw("name='index_img'")->first()->value))
        <img class="index_img" src="{{\App\Setings::whereRaw("name='index_img'")->first()->value}}" alt="{{\App\Setings::whereRaw("name='siteName'")->first()->value}}">
        @endif
            <div class="columns">
            @foreach($good as $goodinfo)
                <div class="column col-4 col-md-12">
                    <div class="card">
                        <div class="card-image">
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">{{$goodinfo->name}}</h4>
                            <h6 class="card-subtitle">{{$goodinfo->model}}  <b>{{$goodinfo->price}}</b>/年</h6>
                        </div>
                        <div class="card-body">
                            {!! $goodinfo->description !!}
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary" href="/host/{{$goodinfo->model}}">购买</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="index-shop">
        <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
        <span><a href="http://www.hostinp.com/host">更多好选择，请访问我们的主机列表</a></span>
    </div>
</section>

<div class="card index-panel">
    <section class="container grid-960">
        <h2>我们的优势</h2>
        <div class="container content">
            <div class="columns">
                <div class="column col-md-3">
                    <li><i class="fa fa-battery-full" aria-hidden="true"></i><span>充满活力的创业团队</span></li>
                    <li><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span>下单后自动即时开通</span></li>
                    <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i><span>全天候工单技术支持</span></li>
                    <li><i class="fa fa-clock-o" aria-hidden="true"></i><span>四十八小时全额退款</span></li>
                    <li><i class="fa fa fa-heartbeat" aria-hidden="true"></i><span>做一个低调的主机商</span></li>
                </div>

                <div class="column col-md-3">
                    <b style="font-size: 110%"><i class="fa fa-check-square-o" aria-hidden="true"></i>精选机房线路</b>
                    上线的一切虚拟主机 / VPS ，机房均经过精挑细选，充分考虑用户地区以及访问速度因素，为用户提供低延迟、少绕路、性价比高的良心产品
                </div>

                <div class="column col-md-3"><b style="font-size: 110%"><i class="fa fa-check-square-o" aria-hidden="true"></i>开发实力雄厚</b>
                    上线的一切虚拟主机 / VPS ，机房均经过精挑细选，充分考虑用户地区以及访问速度因素，为用户提供低延迟、少绕路、性价比高的良心产品
                </div>

                <div class="column col-md-3">
                    <b style="font-size: 110%"><i class="fa fa-check-square-o" aria-hidden="true"></i>PHP多版本</b>
                    控制面板支持一键切换PHP版本，高至 PHP7.1，低至 PHP5.2，强劲兼容市面上 99% 的常见 PHP + MySQL 建站程序
                </div>

            </div>
        </div>
    </section>
</div>



@include('footer')