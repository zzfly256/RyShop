@include('admin.if')
@section('title')
    虚拟主机商品列表
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
                <div class="card">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>型号</th>
                            <th>用户</th>
                            <th>后台账户</th>
                            <th>订单号</th>
                            <th>价格</th>
                            <th>有效期至</th>
                            <th>状态</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hosts as $hostinfo)
                            <tr>
                                <td>{{$hostinfo->model}}</td>
                                <td><a href="/admin/order/user/{{$hostinfo->user_id}}">{{\App\User::find($hostinfo->user_id)->name}}</a></td>
                                <td>{{$hostinfo->host_name}}</td>
                                <td><a href="/admin/order/{{$hostinfo->order_no}}">{{$hostinfo->order_no}}</td>
                                <td>{{$hostinfo->price}}</td>
                                <td>{{$hostinfo->end_at}}</td>
                                <td>
                                    @if($hostinfo->valid==1)
                                        <span style="color: #4CAF50">正常</span>
                                        @elseif($hostinfo->valid==0)
                                        <span style="color: #607D8B">未开通</span>
                                        @else
                                        <span style="color: #FF9800">过期</span>
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