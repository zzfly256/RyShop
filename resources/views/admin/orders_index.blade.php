@include('admin.if')
@section('title')
    用户列表
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
                            <th>订单号</th>
                            <th>型号</th>
                            <th>价格</th>
                            <th>用户</th>
                            <th>支付状态</th>
                            <th>截止日</th>
                            <th>详情</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $orderinfo)
                            <tr>
                                <td>{{$orderinfo->no}}</td>
                                <td>{{$orderinfo->model}}</td>
                                <td>{{$orderinfo->price}}</td>
                                <td><a href="/admin/order/user/{{$orderinfo->user_id}}">{{$orderinfo->user->name}}</a></td>
                                <td><?php if($orderinfo->payout==1){echo '<label class="label label-success">成功</label>';}else{echo '<label class="label label-warning">未支付</label>';}?></td>
                                <td>{{$orderinfo->end_at}}</td>
                                <td><a href="/admin/order/{{$orderinfo->no}}" class="btn">详情</a></td>
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