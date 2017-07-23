<div class="navbar-background">
    <section class="grid-header container grid-960">
        <header class="navbar">
            <section class="navbar-section">
                <a href="/" class="navbar-brand">RyShop</a>
                <a href="/host" class="btn btn-link">主机列表</a>
                @if(Auth::user())
                <a href="/my_host" class="btn btn-link">我的主机</a>
                <a href="/my_order" class="btn btn-link">我的订单</a>
                    @if(Auth::user()->level==0)
                        <a href="/admin" class="btn btn-link">管理员面板</a>
                    @endif
                @endif
            </section>
            <section class="navbar-section">
                <div class="input-group input-inline">
                    @if(Auth::user())
                    <div class="dropdown">
                        <a href="#" class="btn btn-link dropdown-toggle" tabindex="0">
                            欢迎您：<?php echo Auth::user()->name;?><i class="icon icon-caret"></i>
                        </a>
                        <!-- menu component -->
                        <ul class="menu">
                            <li class="menu-item"><a href="/home" class="btn btn-link">个人资料</a></li>
                            <li class="menu-item"><a href="/auth/logout" class="btn btn-link">退出</a></li>
                        </ul>
                    </div>

                    @else
                    <a href="/auth/login" class="btn btn-link">登录</a>
                    <a href="/auth/register" class="btn btn-link">注册</a>
                    @endif
                </div>
            </section>
        </header>
    </section>
</div>