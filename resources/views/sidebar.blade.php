<ul class="menu">
    <!-- menu header text -->
    <li class="divider" data-content="主机管理">
    </li>
    <!-- menu item -->
    <li class="menu-item">
        <a href="/host">
            <i class="icon icon-link"></i> 我的主机
        </a>
        <a href="/order">
            <i class="icon icon-link"></i> 我的订单
        </a>
    </li>
    <li class="divider" data-content="用户管理">
    </li>
    <!-- menu item -->
    <li class="menu-item">
        <a href="/auth/home/{{Auth::user()->id}}">
            <i class="icon icon-link"></i> 个人资料
        </a>
        <a href="/auth/home/{{Auth::user()->id}}/edit">
            <i class="icon icon-link"></i> 修改资料
        </a>
    </li>

</ul>