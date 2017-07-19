<ul class="menu">
    <!-- menu header text -->
    <li class="divider" data-content="主机管理">
    </li>
    <!-- menu item -->
    <li class="menu-item">
        <a href="/admin/host/add">
            <i class="icon icon-plus"></i> 添加主机
        </a>
        <a href="/admin/host">
            <i class="icon icon-link"></i> 主机列表
        </a>
    </li>
    <li class="divider" data-content="用户管理">
    </li>
    <!-- menu item -->
    <li class="menu-item">
        <div class="menu-badge">
            <label class="label label-primary">{{$user_count}}</label>
        </div>
        <a href="/admin/users">
            <i class="icon icon-link"></i> 用户列表
        </a>
    </li>
    <!-- menu divider -->
    <li class="divider"></li>
    <!-- menu item with badge -->
    <li class="menu-item">
        <div class="menu-badge">
            <label class="label label-primary">2</label>
        </div>
        <a href="#">
            <i class="icon icon-link"></i> 订单列表
        </a>
    </li>
</ul>