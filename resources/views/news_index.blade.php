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


            @foreach($news as $newsinfo)
                <div class="order-item">
                        <span class="big-font"><a href="/news/{{$newsinfo->id}}">{{$newsinfo->title}}</a><small class="model-label"><small>{{\Carbon\Carbon::parse()->toDateString($newsinfo->created_at)}}</small></small>
                        </span>
                    <br>
                    <span style="opacity: 0.7">{!! $newsinfo->description !!}</span>

                </div>
            @endforeach



    </div>
</section>

@include('footer')