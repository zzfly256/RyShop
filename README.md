# RyShop 虚拟主机销售系统(在线商城程序)
Updated at 7/20/2017

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

## 界面部分
### 用户层面
- 注册/登录
- 查看商品
- 购买商品( 填写信息->付款->通过API自动开通 )
- 我的主机
- 我的订单

### 管理员层面
#### 物品(主机)管理
- 添加主机 ( 名称 型号 价格 描述 控制面板 )
- 编辑主机
- 删除主机
- 已开通主机

#### 订单管理
- 查看订单( 订单号 用户名 商品型号 付款信息 开通情况 )

#### 用户管理
- 用户编辑
- 用户删除

## 数据表字段
### 用户部分
- id increments
- name string
- email string
- password string
- qq string
- level interger
- timestamps

### 商品部分
- id increments
- name string
- model string
- price double
- description longtext
- panel interger