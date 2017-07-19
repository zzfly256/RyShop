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
                            <th>UID</th>
                            <th>用户名</th>
                            <th>邮箱</th>
                            <th>QQ</th>
                            <th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $userinfo)
                        <tr>
                            <td>{{$userinfo->id}}</td>
                            <td>@if($userinfo->level==0) <font color="#2196F3"> {{$userinfo->name}}</font> @else {{$userinfo->name}} @endif</td>
                            <td>{{$userinfo->email}}</td>
                            <td>{{$userinfo->qq}}</td>
                            <td>
                                <div class="input-group input-inline">
                                    <a class="btn btn-search" href="/admin/users/{{$userinfo->id}}/edit">查询订单</a>
                                    <a class="btn" style="margin-left:5px" href="/admin/users/{{$userinfo->id}}/edit">编辑</a>
                                    {!!  Form::model($userinfo,['url'=>'/admin/users/'.$userinfo->id,'method'=>'DELETE']) !!}
                                    {!! Form::submit('删除',["class"=>"btn btn-delete","style"=>"margin-left:5px"]) !!}
                                    {!!  Form::close() !!}
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