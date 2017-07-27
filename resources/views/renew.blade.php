@section('title')
    {{Auth::user()->name}} {{$host->model}} 续费
@stop
@include('header')
@include('nav')

<section class="container grid-960">
    <div class="container">
        <div class="columns">
            <div class="column col-9 col-md-12">
                2333....
            </div>

            <div class="column col-3 col-md-12">
                @include("sidebar_renew")
            </div>


        </div>
    </div>
</section>

@include('footer')