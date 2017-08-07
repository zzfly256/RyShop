@include('admin.if')
@section('title')
    常规设置
@stop
@include('header')
@include('nav')
<section class="container grid-960">
    <div class="container">
        <div class="columns">
            <div class="column col-3 col-md-12">
                @include("admin.sidebar")
            </div>
            <div class="column col-9 col-md-12">
                <div class="padding-30">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>对接模块</th>
                            <th>IP地址</th>
                            <th>登陆地址</th>
                            <th>识别情况</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($server as $item)

                                <tr>
                                    <td>{{$item["name"]}}</td>
                                    <td>{{$item["ip"]}}</td>
                                    <td>{{$item["panel"]}}</td>
                                    <td>
                                        @if($item["status"]==0)
                                            未识别
                                        @else
                                            已识别
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

</section>

@include('footer')