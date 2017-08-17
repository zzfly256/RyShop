@section('title')
    我的订单
@stop
@include('header')
@include('nav')

@if(Auth::user())
    <section class="container grid-960">
        <div class="container">
            <div class="columns">
                <div class="column col-3 col-md-12">
                    @include("admin.sidebar")
                </div>
                <div class="column col-9 col-md-12">
                    <div class="item-title">
                        工单提问共 <b>{{\App\Ticket::all()->count()}}</b> 个
                        <a href="/admin/tickets/closed" class="new_ticket_btn"> 已关闭（<?php echo \App\Ticket::all()->where("valid","=",'0')->count();?>）</a>
                        <a href="/admin/tickets/open" class="new_ticket_btn"> 有效的（<?php echo \App\Ticket::all()->count()-\App\Ticket::all()->where("valid","=",'0')->count();?>）</a>
                    </div>

                        <div class="ticket-panel">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>标题</th>
                                    <th>时间</th>
                                    <th>用户</th>
                                    <th>回复情况</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tic as $ticinfo)
                                    <tr>
                                        <td><a href="/admin/tickets/{{$ticinfo->id}}">{{$ticinfo->title}}</a></td>
                                        <td><?php echo $ticinfo->updated_at->toDateString();?></td>
                                        <td>
                                            <?php $cur_user = App\User::find($ticinfo->user_id);
                                            echo $cur_user->name ?? "Error";?>
                                        </td>
                                        <td style="text-align: center">
                                            @if($ticinfo->reply==$ticinfo->user_id)
                                                <div class="inline" style="color: #607D8B;">尚未</div>
                                            @else
                                                <div class="inline" style="color: #4CAF50;">√，<?php echo App\User::find($ticinfo->reply)->name ?? "Error";?></div>
                                            @endif

                                        </td>
                                        <td>
                                            {!! Form::open(['url'=>'/admin/tickets/'.$ticinfo->id,'method'=>'PATCH']) !!}
                                            {!! Form::hidden('valid',0) !!}
                                            {!! Form::submit('关闭',["class"=>"btn btn-host"]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    {!! $tic->render() !!}


                </div>

            </div>
        </div>
    </section>
@else
    <section class="container grid-960">
        <div class="card user-info">
            <div class="empty">
                <div class="empty-icon">
                    <i class="icon icon-people"></i>
                </div>
                <h4 class="empty-title">您还没有登录</h4>
                <p class="empty-subtitle">您还没有登录系统，请登录之后再进行操作哦！</p>
                <div class="empty-action">
                    <a href="/auth/login" class="btn btn-primary">登录</a>
                    <a href="/auth/resigter" class="btn">注册</a>
                </div>
            </div>
        </div>
    </section>

@endif
@include('footer')