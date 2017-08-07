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
</section>

@include('footer')