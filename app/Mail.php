<?php

namespace App;
use Tx\Mailer;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    public static function mail($user,$type,$content)
    {

        switch ($type){
            case "signup":
                $mailtitle = "欢迎来到".Setings::whereRaw("name='siteName'")->first()->value;
                $mailcontent = "欢迎您，".User::find($user)->name." <br>您的 UID：".User::find($user)->id."<br> 登录邮箱：".User::find($user)->email. " <br> 您可以到我们的官网：".Setings::whereRaw("name='domain'")->first()->value." 进行产品选购。<br>如有问题，欢迎发送工单提问，祝您使用愉快！";
                break;
            case "order":
                $content_info = explode("||",$content);
                $mailtitle = "[".$content_info[0]."] 订单已创建";
                $mailcontent = Setings::whereRaw("name='siteName'")->first()->value."用户 ".User::find($user)->name."： <br>您的订单 ".$content_info[0]." 已于 ".date("20y-m-d")." 创建成功<br>账单金额：".$content_info[1]." 账单类型：".$content_info[2]."<br>详情可以在“我的订单”中查看：".Setings::whereRaw("name='domain'")->first()->value."order/".$content_info[0]." <br>如有问题，欢迎发送工单提问，祝您使用愉快！";
                break;
            case "create":
                $content_info = explode("||",$content);
                $mailtitle = "[".$content_info[0]."] 已开通";
                $mailcontent = Setings::whereRaw("name='siteName'")->first()->value."用户 ".User::find($user)->name."： <br>您的购买的 ".$content_info[0]." 已经开通<br>网站账户：".$content_info[1]." 默认密码：".$content_info[2]." 控制面板：".$content_info[3]."<br>如有问题，欢迎发送工单提问，祝您使用愉快！";
                break;
        }


        $ok = (new Mailer())
            ->setServer(Setings::whereRaw("name='mail_smtp'")->first()->value, Setings::whereRaw("name='mail_port'")->first()->value)
            ->setAuth(Setings::whereRaw("name='mail_user'")->first()->value, Setings::whereRaw("name='mail_password'")->first()->value)
            ->setFrom(Setings::whereRaw("name='siteName'")->first()->value, Setings::whereRaw("name='mail_address'")->first()->value)
            ->addTo(User::findOrFail($user)->name, User::findOrFail($user)->email)
            ->setSubject($mailtitle)
            ->setBody($mailcontent)
            ->send();
        return $ok;
    }
}
