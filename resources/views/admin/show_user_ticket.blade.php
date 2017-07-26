@section('title')
    用户 {{$user->name}} 全部工单列表
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
                        用户名：<a href="/admin/users/{{$user->id}}/edit" style="color:#aaa">{{$user->name}}</a>，工单提问共 <b>{{\App\User::findOrFail($user->id)->ticket()->count()}}</b> 个
                        <a href="/admin/tickets/user/{{$user->id}}/closed" class="new_ticket_btn"> 关闭的（{{\App\User::find($user->id)->ticket()->whereRaw("valid='0'")->count()}}）</a>
                        <a href="/admin/tickets/user/{{$user->id}}/open" class="new_ticket_btn"> 有效的（{{\App\User::find($user->id)->ticket()->whereRaw("valid='1'")->count()}}）</a>

                    </div>

                    @if(Auth::user()->ticket->count())
                        <div class="ticket-panel">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>标题</th>
                                    <th>时间</th>
                                    <th>状态</th>
                                    <th>回复情况</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tic as $ticinfo)
                                    <tr>
                                        <td><a href="/admin/tickets/{{$ticinfo->id}}">{{$ticinfo->title}}</a></td>
                                        <td><?php echo $ticinfo->created_at->toDateString();?></td>
                                        <td>
                                            @if($ticinfo->valid=="1")
                                                <div class="inline" style="color: #4CAF50">有效</div>
                                            @else
                                                <div class="inline" style="color: #607D8B">已关闭</div>
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                            @if($ticinfo->reply==Auth::user()->id)
                                                <div class="inline" style="color: #607D8B;">尚未</div>
                                            @else
                                                <div class="inline" style="color: #4CAF50;">√</div>
                                            @endif

                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <div class="host-tips toast" @if(Auth::user()->ticket->count()) style="margin-top:10px;" @endif>
                        温馨提示：若您在使用我们的主机产品过程中，有任何的疑问或需要提供我们产品相关的帮助，
                        您可以发送工单并详细描述您的问题，管理员将会在24小时内作出回复。若您的问题在我们答复之后已经
                        得到解决，您可以自行关闭工单，或一段时间无提问后管理员也会将其关闭(或删除)。祝您使用愉快！
                    </div>

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