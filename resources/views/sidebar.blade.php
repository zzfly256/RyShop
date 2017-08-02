<ul class="menu">

    <!-- menu item -->
    <li class="menu-item">
        <a href="/home">
            {{Auth::User()->name}} <small><small>UID：{{Auth::User()->id}}</small></small>
        </a>
        <a href="/home">
            <small>Mail：{{Auth::User()->email}}</small>
        </a>

        <a href="/home">
            <small>QQ：{{Auth::User()->qq}}</small>
        </a>

    </li>

    <!-- menu header text -->
    <li class="divider" data-content="主机管理">
    </li>
    <!-- menu item -->
    <li class="menu-item">
        <div class="menu-badge">
            <label class="label label-primary">{{Auth::user()->host->count()}}</label>
        </div>
        <a href="/my_host">
            <i class="icon icon-link"></i> 我的主机
        </a>
        <div class="menu-badge">
            <label class="label label-primary">{{Auth::user()->order->count()}}</label>
        </div>
        <a href="/my_order">
            <i class="icon icon-link"></i> 我的订单
        </a>
    </li>
    <li class="divider" data-content="用户管理">
    </li>
    <!-- menu item -->
    <li class="menu-item">
        <a href="/home">
            <i class="icon icon-people"></i> 个人资料
        </a>
        <a href="/home/edit">
            <i class="icon icon-link"></i> 修改资料
        </a>
        <a href="/aff">
            <i class="icon icon-link"></i> 用户推广
        </a>
    </li>
    <li class="divider">
    <li class="menu-item">
        <a href="/my_ticket">
            <i class="icon icon-message"></i> 工单提问
        </a>
    </li>


</ul>