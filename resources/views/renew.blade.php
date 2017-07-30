@section('title')
    {{Auth::user()->name}} {{$host->model}} 续费
@stop
@include('header')
@include('nav')
<section class="container grid-960">
    <div class="container">
        <div class="columns">
            <div class="column col-9 col-md-12">
                <?php if(!empty(\App\Good::whereRaw("model='".$host->model."'")->first())){?>

                <div class="card host-info">
                    <h5>{{\App\Good::whereRaw("model='".$host->model."'")->first()->name}}<small class="label"><small>{{$host->model}}</small></small></h5>
                    <hr>
                    <div class="host-detail">
                        {!! \App\Good::whereRaw("model='".$host->model."'")->first()->details !!}
                    </div>
                </div>
                <div class="host-tips toast">
                    温馨提示：请仔细核对本页信息是否正确，并且阅读 <a href="">服务条款</a> 哦！购买成功则代表您同意本站服务条款。
                </div>

                <?php }else{?>
                    <div class="card host-info">
                        <b>请注意：</b>您购买的主机型号已经下架，请您通过提交工单等形式向管理员核实该款型号是否仍然可以续费使用之后再行付款。
                    </div>
                        <?php }?>
            </div>
            <div class="column col-3 col-md-12">
                @include("sidebar_renew")
            </div>

        </div>
    </div>
</section>


@include('footer')