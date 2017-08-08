@include('admin.if')
@section('title')
新闻公告列表
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
                            <th>标题</th>
                            <th>发布者</th>
                            <th>日期</th>
                            <th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //dd($news);
                        ?>
                        @foreach($news as $newsinfo)
                        <tr>
                            <td>{{$newsinfo->title}}</td>
                            <td>{{\App\User::find($newsinfo->user_id)->name}}</td>
                            <td>{{\Carbon\Carbon::parse()->toDateString($newsinfo->created_at)}}</td>
                            <td>
                                <div class="input-group input-inline">
                                    <a class="btn" href="/admin/news/{{$newsinfo->id}}/edit">编辑</a>
                                    {!!  Form::model($newsinfo,['url'=>'/admin/news/'.$newsinfo->id,'method'=>'DELETE']) !!}
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