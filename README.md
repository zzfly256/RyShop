# RyShop 虚拟主机销售系统
Updated at 8/09/2017
- Author：Rytia
- Blog：www.zzfly.net
---
- 本系统原本为我为 数据结构 课设所写，采用 PHP 语言，基于 Laravel 框架，前端样式魔改自 spectre，现以 MIT license 开源。
- 本系统支持与 EasyPanel 等虚拟主机控制面板以及 SolusVM(待测试) 等VPS管理面板对接，实现付款成功之后产品的即时开通。
- 本系统拥有 工单系统、新闻系统、推介系统 等基础模块以及外观设置、发信邮箱设置等基础功能
- 本系统开发初衷为完成课程设计，以及研究这其中的业务逻辑，若将本系统用于商业用途，请自行考虑是否具有相应正规资质，因此所导致的一切纠纷原作者以及开源贡献人不负有相应责任。

## 环境需求
- PHP >= 5.5.9
- MySQL / MariaDB
- composer

安装后请确保可以通过命令 ``php -v`` ``composer -v`` 查看到两者的版本

## 安装
```
composer install  #自动安装需求环境
php artisan migrate  #执行数据库迁移 
```
#### 使用 PHP Cli_Server 驱动
```
cd public
php -S 0.0.0.0:80
```
#### 使用 Nginx / Apache 等驱动参照 Laravel 框架通用方法，将 /public 设置为工作根目录
完成上诉步骤后，访问 ```http://您的域名/install``` 完成最后安装

## 对接模块
- 本系统所有与服务器对接的模块放置于 ``/server/`` 下，目录名字即为后台所识别的模块名称
- 每一个完整的模块包含着 ``setings.php`` ``create.php`` ``delete.php`` ``start.php`` ``stop.php`` 五个文件。分别对应五个不同的操作。
- 模块制作规范请正在制作中，具体可以参照现有的 ep1 (与EasyPanel对接) 示例


