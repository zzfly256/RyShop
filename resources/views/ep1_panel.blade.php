@section('title')
    我购买的主机
@stop
@include('header')
@include('nav')

@if(Auth::user())
    <html style="height: 100%">
    <body style="height:100%;">
    <iframe id="panel-content" name="panel" width="100%" style="margin-top:-10px" frameborder="0" scrolling="auto" src="http://107.167.10.54:3312/vhost/"></iframe>
    <script src="/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        //console.log($("body").height());
        Height = $("body").height()-60;
        $("#panel-content").css("height",Height+"px");
    </script>
    </body>
    </html>

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