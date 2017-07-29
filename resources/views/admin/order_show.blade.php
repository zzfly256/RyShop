@include('admin.if')
@section('title')
    订单{{$order_get->no}}详细信息
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
                <div class="card padding-30">
                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td>系统订单号</td>
                            <td>{{$order_get->no}}</td>
                        </tr>
                        <tr>
                            <td>商家订单号</td>
                            <td>alip1337000{{$order_get->no}}</td>
                        </tr>
                        <tr>
                            <td>订单金额</td>
                            <td>{{$order_get->price}}</td>
                        </tr>
                        <tr>
                            <td>有效期至</td>
                            <td>{{$order_get->end_at}}</td>
                        </tr>
                        <tr>
                            <td>创建日期</td>
                            <td>{{$order_get->created_at}}</td>
                        </tr>
                        <tr>
                            <td>支付状态</td>
                            <td><?php if($order_get->payout==1){echo '<label class="label label-success">成功</label>';}else{echo '<label class="label label-warning">未支付</label>';}?></td>
                        </tr>
                        <tr>
                            <td>账单类型</td>
                            <td><?php if($order_get->target==0){echo '购入';}else{echo '续费';}?></td>
                        </tr>
                        <tr>
                            <td>主机型号</td>
                            <td>{{$order_get->model}}</td>
                        </tr>
                        <tr>
                            <td>所属用户</td>
                            <td>{{$order_get->user->name}}</td>
                        </tr>
                        <tr>
                            <td>用户邮箱</td>
                            <td>{{$order_get->user->email}}</td>
                        </tr>
                        <tr>
                            <td>用户QQ</td>
                            <td>{{$order_get->user->qq}}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</section>

@include('footer')