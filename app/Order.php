<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['no', 'model', 'price', 'user_id', 'end_at', 'payout'];

    public static function checkout($price,$id,$no)
    {

        $apiid = '13370';
        $apikey = md5('6ce72252d6962a926a26fa2c6d685f6c');
        $showurl = 'http://127.0.0.1/order/result';
        $addnum =  'alip'.$apiid.'00'.$no;


        echo "
		<form name='form1' action='https://api.jsjapp.com/plugin.php?id=add:alipay' method='POST'>
			<input type='hidden' name='uid' value='".$id."'>
			<input type='hidden' name='total' value='".$price."'>
			<input type='hidden' name='apiid' value='".$apiid."'>
			<input type='hidden' name='showurl' value='".$showurl."'>
			<input type='hidden' name='apikey' value='".$apikey."'>
			<input type='hidden' name='addnum' value='".$addnum."'>
		</form>
		<script>window.onload=function(){document.form1.submit();}</script> 
	";
    }

    public static function is_succeed($apikey,$price,$cur_order)
    {
        if($apikey!=md5('6ce72252d6962a926a26fa2c6d685f6c'.$cur_order->no)) {
            if($cur_order->price == $price){
                return true;
            }
        }
        return false;
    }
}
