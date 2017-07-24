<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $table = 'hosts';
    protected $fillable = ['order_no', 'model', 'price', 'user_id', 'end_at', 'host_name', 'host_pass', 'host_panel', 'valid'];

    public static function create_host($panel,$model,$user,$password)
    {
        if($panel == "ep1")
        {
            $url = "http://107.167.10.54:3312/api/";
            $passkey = "uKESqPvRJ4B9VjPB";

            $rand_key = rand(1000,9999);
            $security_key = md5("add_vh".$passkey.$rand_key);

            $api = $url."?c=whm&a=add_vh&r=".$rand_key."&s=".$security_key."&name=".$user."&passwd=".$password."&init=1&json=1&product_name=".$model;

            $result = file_get_contents($api);
            $json_result = json_decode($result);
            if($json_result->result!=200){
                return false;
            }
            else{
                return true;
            }
        }


    }

    public static function stop_host($panel,$user)
    {
        if($panel == "ep1")
        {
            $url = "http://107.167.10.54:3312/api/";
            $passkey = "uKESqPvRJ4B9VjPB";

            $rand_key = rand(1000,9999);
            $security_key = md5("update_vh".$passkey.$rand_key);

            $api = $url."?c=whm&a=update_vh&r=".$rand_key."&s=".$security_key."&name=".$user."&json=1&status=1";

            $result = file_get_contents($api);
            $json_result = json_decode($result);
            if($json_result->result!=200){
                return false;
            }
            else{
                return true;
            }
        }


    }

    public static function start_host($panel,$user)
    {
        if($panel == "ep1")
        {
            $url = "http://107.167.10.54:3312/api/";
            $passkey = "uKESqPvRJ4B9VjPB";

            $rand_key = rand(1000,9999);
            $security_key = md5("update_vh".$passkey.$rand_key);

            $api = $url."?c=whm&a=update_vh&r=".$rand_key."&s=".$security_key."&name=".$user."&json=1&status=0";

            $result = file_get_contents($api);
            $json_result = json_decode($result);
            if($json_result->result!=200){
                return false;
            }
            else{
                return true;
            }
        }


    }

    public static function delete_host($panel,$user)
    {
        if($panel == "ep1")
        {
            $url = "http://107.167.10.54:3312/api/";
            $passkey = "uKESqPvRJ4B9VjPB";

            $rand_key = rand(1000,9999);
            $security_key = md5("del_vh".$passkey.$rand_key);

            $api = $url."?c=whm&a=del_vh&r=".$rand_key."&s=".$security_key."&name=".$user."&json=1";

            $result = file_get_contents($api);
            $json_result = json_decode($result);
            if($json_result->result!=200){
                return false;
            }
            else{
                return true;
            }
        }


    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
