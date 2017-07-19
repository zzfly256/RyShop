@section('title')
    个人资料
@stop
@include('user_if')
@include('header')
@include('nav')

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
                        <p class="empty-subtitle">{{Auth::user()->email}} - QQ：{{Auth::user()->qq}}</p>

                        <p class="empty-subtitle"><small>注册于 <?php echo explode(" ",Auth::user()->created_at)[0];?>，拥有 <b>4</b> 台主机 <b>4</b> 个订单</small></p>

                        <div class="empty-action">
                            <a class="btn btn-primary" href="/auth/home/{{Auth::user()->id}}/edit">编辑资料</a>
                        </div>
                    </div
                </div>
            </div>

        </div>
    </div>
</section>

@include('footer')