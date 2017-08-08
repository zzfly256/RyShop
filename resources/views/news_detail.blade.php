@section('title')
    新闻公告
@stop
@include('header')
@include('nav')

<section class="container grid-960">
    <div class="container">
        <div class="columns">

                <div class="order-item">
                        <span class="big-font">
                            {{$news->title}}
                            <br>
                            <small class="model-label">
                                <small style="opacity: 0.8">{{\App\User::find($news->user_id)->name}} 发布于 {{\Carbon\Carbon::parse()->toDateString($news->created_at)}}</small>
                            </small>
                        </span>
                    <br>
                    <span style="opacity: 0.9">{!! $news->content !!}</span>

                </div>
        </div>

    </div>
</section>

@include('footer')