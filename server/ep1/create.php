<?php 
require('setings.php');

$rand_key = rand(1000,9999);
$security_key = md5("add_vh".$passkey.$rand_key);

$api = $url."?c=whm&a=add_vh&r=".$rand_key."&s=".$security_key."&name=".$user."&passwd=".$password."&init=1&json=1&product_name=".$model;

$result = file_get_contents($api);
$json_result = json_decode($result);

require('result.php'); 
?>