@include('admin.if')
@section('title')
    已购买虚拟主机列表
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
                            <th>管理</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hosts as $hostinfo)
                            <tr>
                                <td>{{$hostinfo->model}}</td>
                                <td><a href="/admin/vhost/user/{{$hostinfo->user_id}}">{{\App\User::find($hostinfo->user_id)->name}}</a></td>
                                <td>{{$hostinfo->host_name}}</td>
                                <td><a href="/admin/order/{{$hostinfo->order_no}}">{{$hostinfo->order_no}}</td>
                                <td>{{$hostinfo->price}}</td>
                                <td>{{$hostinfo->end_at}}</td>
                                <td>
                                    @if($hostinfo->valid==1)
                                        <span style="color: #4CAF50">正常</span>
                                        @elseif($hostinfo->valid==0)
                                        <span style="color: #607D8B">未开通</span>
                                        @elseif($hostinfo->valid==2)
                                        <span style="color: #FF9800">暂停</span>
                                        @else
                                        <span style="color: #FF5722">过期</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="input-group input-inline">
                                    {!!  Form::model($hostinfo,['url'=>'/admin/vhost/'.$hostinfo->id]) !!}
                                    @if($hostinfo->valid==1)
                                        {!! Form::hidden('valid','2') !!}
                                        {!! Form::submit('暂停',["class"=>"btn btn-host"]) !!}
                                    @elseif($hostinfo->valid==2)
                                        {!! Form::hidden('valid','1') !!}
                                        {!! Form::submit('重开',["class"=>"btn btn-order"]) !!}
                                    @endif
                                    @if($hostinfo->valid!=0)
                                    {!!  Form::close() !!}
                                    {!!  Form::model($hostinfo,['url'=>'/admin/vhost/'.$hostinfo->id,'method'=>'DELETE']) !!}
                                    {!! Form::submit('删除',["class"=>"btn btn-delete","style"=>"margin-left:5px"]) !!}
                                    {!!  Form::close() !!}
                                    @endif
                                    </div>
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