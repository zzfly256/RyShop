@section('title')
新闻公告
@stop
@include('header')
@include('nav')

<section class="container grid-960">
    <div class="container">
        @if(!empty(\App\Setings::whereRaw("name='index_img'")->first()->value))
            <img class="index_img" src="{{\App\Setings::whereRaw("name='index_img'")->first()->value}}" alt="{{\App\Setings::whereRaw("name='siteName'")->first()->value}}">
        @endif

            <div class="index_info">
                <span id="tos-open"> 温馨提示：购买前请注意阅读{{\App\Setings::whereRaw("name='siteName'")->first()->value}}服务条款，以免发生不必要的纠纷哦</span>
            </div>
            <div class="modal" id="tos">
                <div class="modal-overlay"></div>
                <div class="modal-container">
                    <div class="modal-header">
                        <button class="btn btn-clear float-right" id="tos-close"></button>
                        <div class="modal-title h5"> {{\App\Setings::whereRaw("name='siteName'")->first()->value}} 服务条款</div>
                    </div>
                    <div class="modal-body">
                        <div class="content">
                            {!! \App\Setings::whereRaw("name='item'")->first()->value !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <small style="color:#eee;">Powered by RyShop</small>
                    </div>
                </div>
            </div>

            @foreach($news as $newsinfo)
                <div class="order-item">
                        <span class="big-font"><a href="/news/{{$newsinfo->id}}">{{$newsinfo->title}}</a><small class="model-label"><small>{{\Carbon\Carbon::parse()->toDateString($newsinfo->created_at)}}</small></small>
                        </span>
                    <br>
                    <span style="opacity: 0.7">{!! $newsinfo->description !!}</span>

                </div>
            @endforeach

            {!! $news->render() !!}

    </div>
</section>
<script src="/jquery-3.2.1.min.js"></script>
<script type="application/javascript">
    $("#tos-close").click(function(){
        $("#tos").removeClass("active");
    })
    $("#tos-open").click(function(){
        $("#tos").addClass("active");
    })
</script>
@include('footer')