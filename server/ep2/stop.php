<?php
require('setings.php');

$rand_key = rand(1000,9999);
$security_key = md5("update_vh".$passkey.$rand_key);

$api = $url."?c=whm&a=update_vh&r=".$rand_key."&s=".$security_key."&name=".$user."&json=1&status=1";

$result = file_get_contents($api);
$json_result = json_decode($result);

require('result.php');
?>