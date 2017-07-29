@section('title')
    {{Auth::user()->name}} {{$host->model}} 续费
@stop
@include('header')
@include('nav')
<section class="container grid-960">
    <div class="container">
        <div class="columns">
            <div class="column col-9 col-md-12">
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
            </div>
            <div class="column col-3 col-md-12">
                @include("sidebar_renew")
            </div>

        </div>
    </div>
</section>


@include('footer')