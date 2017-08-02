# RyShop 虚拟主机销售系统(在线商城程序)
Updated at 8/02/2017

## 模块设计
### 物品模块
- 添加商品
- 编辑商品
- 删除商品

### 订单模块
- 系统订单

### 已开通主机模块
- 虚拟主机信息

### 用户管理
- 注册登录
- 用户编辑
- 用户删除

### 工单模块
- 发送工单
- 回复工单
- 删除工单

### 设置模块
- 储存设置信息
- 初始化站点（安装站点）


## 界面部分
### 用户层面
- 注册/登录
- 查看商品
- 购买商品( 填写信息->付款->通过API自动开通 )
- 我的主机
- 我的订单
- 工单提问

### 管理员层面
#### 物品(主机)管理
- 添加主机 ( 名称 型号 价格 描述 控制面板 )
- 编辑主机
- 删除主机

#### 订单管理
- 查看订单( 订单号 用户名 商品型号 付款信息 开通情况 )

#### 用户管理
- 用户编辑
- 用户删除

#### 工单管理
- 查看工单
- 发送工单
- 删除工单

#### 虚拟主机管理
- 已开通虚拟主机
- 关闭/重启虚拟主机
- 储存续费信息

#### 设置模块
##### 常规设置
- 站点名称
- 站点关键词
- 站点描述
- 产品使用条款
##### 外观设置
- 主页 展示图片
- 主页 提示语
- 主机详情 提示语
- 工单页面 提示语
- 底部版权 提示语

## 数据表字段
### 用户部分
- id increments
- name string
- email string
- password string
- qq string
- level integer
- amount double
- timestamps

### 商品部分
- id increments
- name string
- model string
- price double
- description longtext
- details longtext
- panel string
- timestamps

### 订单部分
- id increments
- no string
- model string
- user_id integer
- price double
- end_at string
- payout boolean
- aff_id integer
- timestamps

### 已开通主机部分
- id increments
- order_no string
- model string
- user_id integer
- price double
- end_at string
- host_name
- host_pass
- host_panel
- timestamps

### 工单系统部分
- id increments
- content longtext
- user_id integer
- reply integer
- valid integer
- timestamp

### 设置部分
- id increments
- name string
- value longtext