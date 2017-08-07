@section('title')
    虚拟主机商品列表
@stop
@include('header')
@include('nav')

<section class="container grid-960">
    <div class="container">
        <div class="index_info">
            {!! \App\Setings::whereRaw("name='index_text'")->first()->value !!}
        </div>
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