<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setings extends Model
{
    protected $table = 'setings';
    protected $fillable = ['name','value'];

    public static function install($siteName)
    {
        $name = ['name'=>"siteName",'value'=>$siteName];
        Setings::create($name);
        $keyword = ['name'=>"keyword", 'value'=>'RyShop'];
        Setings::create($keyword);
        $description = ['name'=>"description", 'value'=>"本站基于 RyShop 主机销售系统 构建。RyShop 主机销售系统是一套免费开源的主机销售系统，由 Rytia 设计并实现"];
        Setings::create($description);
        $item = ['name'=>"item", 'value'=>'本站基于 RyShop 主机销售系统 构建，请合法合理使用本程序'];
        Setings::create($item);
        $index_img = ['name'=>"index_img"];
        Setings::create($index_img);
        $index_text = ['name'=>"index_text", 'value'=>'欢迎使用 RyShop 主机销售系统'];
        Setings::create($index_text);
        $good_text = ['name'=>"good_text", 'value'=>'RyShop 主机销售系统提醒您，请认真核对您的账单信息'];
        Setings::create($good_text);
        $ticket_text = ['name'=>"ticket_text", 'value'=>'RyShop 主机销售系统提醒您，若您对产品使用有问题，欢迎发送工单向管理员咨询'];
        Setings::create($ticket_text);
        $footer_text = ['name'=>"footer_text", 'value'=>'RyShop 主机销售系统. 2017'];
        Setings::create($footer_text);

    }
}
