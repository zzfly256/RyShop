@section('title')
    {{$good[0]->name}} {{$good[0]->model}} 详细介绍
@stop
@include('header')
@include('nav')

<section class="container grid-960">
    <div class="container">
        <div class="columns">
            <div class="column col-9 col-md-12">
                <div class="card host-info">
                    <h5>{{$good[0]->name}}<small class="label"><small>{{$good[0]->model}}</small></small></h5>
                    <hr>
                    <div class="host-detail">
                        {!! $good[0]->details !!}
                    </div>
                </div>
                <div class="host-tips toast">
                    温馨提示：请仔细核对本页信息是否正确，并且阅读 <a href="">服务条款</a> 哦！购买成功则代表您同意本站服务条款。
                </div>
            </div>

            <div class="column col-3 col-md-12">
                @include("sidebar_buy")
            </div>


        </div>
    </div>
</section>

@include('footer')