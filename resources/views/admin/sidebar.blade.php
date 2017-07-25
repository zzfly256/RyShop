<ul class="menu">
    <!-- menu header text -->
    <li class="divider" data-content="主机管理">
    </li>
    <!-- menu item -->
    <li class="menu-item">
        <a href="/admin/host/add">
            <i class="icon icon-plus"></i> 添加产品
        </a>
        <a href="/admin/host">
            <div class="menu-badge">
                <label class="label label-primary">{{App\Good::all()->count()}}</label>
            </div>
            <i class="icon icon-link"></i> 产品列表
        </a>
        <a href="/admin/vhost">
            <div class="menu-badge">
                <label class="label label-primary">{{App\Host::all()->count()}}</label>
            </div>
            <i class="icon icon-link"></i> 虚拟主机
        </a>
    </li>
    <li class="divider" data-content="用户管理">
    </li>
    <!-- menu item -->
    <li class="menu-item">
        <div class="menu-badge">
            <label class="label label-primary">{{App\User::all()->count()}}</label>
        </div>
        <a href="/admin/users">
            <i class="icon icon-people"></i> 用户列表
        </a>
    </li>
    <!-- menu divider -->
    <li class="divider"></li>
    <!-- menu item with badge -->
    <li class="menu-item">
        <div class="menu-badge">
            <label class="label label-primary">{{App\Order::all()->count()}}</label>
        </div>
        <a href="/admin/order">
            <i class="icon icon-link"></i> 订单列表
        </a>
        <a href="/admin/tickets">
            <i class="icon icon-message"></i> 工单管理
        </a>
    </li>
</ul>