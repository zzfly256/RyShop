@include('admin.if')
@section('title')
    订单列表
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
                <div class="item-title">
                    订单共 <b>{{\App\Order::all()->count()}}</b> 个
                    <a href="/admin/order/unpaid" class="new_ticket_btn"> 未支付（<?php echo \App\Order::all()->where("payout","=",'0')->count();?>）</a>
                    <a href="/admin/order/paid" class="new_ticket_btn"> 已支付（<?php echo \App\Order::all()->count()-\App\Order::all()->where("payout","=",'0')->count();?>）</a>
                </div>
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
                            <th>操作</th>
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

                                <td>
                                    {!! Form::open(['url'=>'/admin/order/'.$orderinfo->id,'method'=>'DELETE']) !!}
                                    {!! Form::submit('删除',["class"=>"btn btn-delete"]) !!}
                                    {!! Form::close() !!}
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