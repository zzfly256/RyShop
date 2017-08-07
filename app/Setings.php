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
        $aff_rate = ['name'=>"aff_rate", 'value'=>'0.2'];
        Setings::create($aff_rate);
        $aff_standard = ['name'=>"aff_standard", 'value'=>'50'];
        Setings::create($aff_standard);
        $aff_text = ['name'=>"aff_text", 'value'=>'RyShop 主机销售系统提醒您，通过您的链接访问我们的网站，购买我们的产品，您可以获得10%的佣金并满50元可以提现哦'];
        Setings::create($aff_text);

    }

    public static function server()
    {
        $dir="../server/";
        $file=scandir($dir);
        $result = [];
        $i=0;
        foreach ($file as $item) {
            if($item!='.' and $item!='..')
            {
                if(is_file($dir.$item."/create.php") and is_file($dir.$item."/start.php") and is_file($dir.$item."/stop.php") and is_file($dir.$item."/delete.php") and is_file($dir.$item."/setings.php"))
                {
                    include $dir.$item."/setings.php";
                    $ip=explode("/",$url);
                    $ip=explode(":",$ip[2]);
                    $result[$i++] = ['name'=>$item, 'ip'=>$ip[0],'panel'=>$loginPanel, 'status'=>1];
                }else{
                    $result[$i++] = ['name'=>$item, 'ip'=>'', 'status'=>0];
                }

            }
        }
        return $result;
    }

}
