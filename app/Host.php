<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $table = 'hosts';
    protected $fillable = ['order_no', 'model', 'price', 'user_id', 'end_at', 'host_name', 'host_pass', 'host_panel', 'valid'];

    public static function create_host($panel,$model,$user,$password)
    {
        require('../server/'.$panel.'/create.php');
        if($server_result==0){
            return false;
        }
        else{
            return true;
        }
    }

    public static function stop_host($panel,$user)
    {
        require('../server/'.$panel.'/stop.php');

        if($server_result==0){
            return false;
        }
        else{
            return true;
        }
    }

    public static function start_host($panel,$user)
    {
        require('../server/'.$panel.'/start.php');

        if($server_result==0){
            return false;
        }
        else{
            return true;
        }


    }

    public static function delete_host($panel,$user)
    {
        require('../server/'.$panel.'/delete.php');

        if($server_result==0){
            return false;
        }
        else{
            return true;
        }


    }

    public static function go_panel($panel)
    {
        require('../server/'.$panel.'/setings.php');

        return $loginPanel;


    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
