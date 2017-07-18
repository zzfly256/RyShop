@section('title')
    虚拟主机商品列表
@stop
@include('admin.if')
@include('header')
@include('nav')
<section class="container grid-960">
    <div class="container">
        <div class="columns">
            <div class="column col-3 col-md-12">
                @include("admin.nav")
            </div>
            <div class="column col-9 col-md-12">
                <div class="card">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>型号</th>
                            <th>价格</th>
                            <th>面板</th>
                            <th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>美国虚拟主机 512M</td>
                            <td>USLA-1</td>
                            <td>36</td>
                            <td>EasyPanel</td>
                            <td>
                                <button class="btn">编辑</button>
                                <button class="btn">删除</button>
                            </td>
                        </tr>
                        <tr>
                            <td>美国虚拟主机 512M</td>
                            <td>USLA-1</td>
                            <td>36</td>
                            <td>EasyPanel</td>
                            <td>
                                <button class="btn">编辑</button>
                                <button class="btn">删除</button>
                            </td>
                        </tr>
                        <tr>
                            <td>美国虚拟主机 512M</td>
                            <td>USLA-1</td>
                            <td>36</td>
                            <td>EasyPanel</td>
                            <td>
                                <button class="btn">编辑</button>
                                <button class="btn">删除</button>
                            </td>
                        </tr>
                        <tr>
                            <td>美国虚拟主机 512M</td>
                            <td>USLA-1</td>
                            <td>36</td>
                            <td>EasyPanel</td>
                            <td>
                                <button class="btn">编辑</button>
                                <button class="btn btn-delete">删除</button>
                            </td>
                        </tr>
                        <tr>
                            <td>美国虚拟主机 512M</td>
                            <td>USLA-1</td>
                            <td>36</td>
                            <td>EasyPanel</td>
                            <td>
                                <button class="btn">编辑</button>
                                <button class="btn">删除</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>

@include('footer')