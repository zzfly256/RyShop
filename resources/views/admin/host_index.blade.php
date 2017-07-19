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
                            <th>名称</th>
                            <th>型号</th>
                            <th>价格</th>
                            <th>模块</th>
                            <th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($good as $goodinfo)
                        <tr>
                            <td>{{$goodinfo->name}}</td>
                            <td>{{$goodinfo->model}}</td>
                            <td>{{$goodinfo->price}}</td>
                            <td>{{$goodinfo->panel}}</td>
                            <td>
                                <div class="input-group input-inline">
                                    <a class="btn" href="/admin/host/{{$goodinfo->id}}/edit">编辑</a>
                                    {!!  Form::model($good,['url'=>'/admin/host/'.$goodinfo->id,'method'=>'DELETE']) !!}
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