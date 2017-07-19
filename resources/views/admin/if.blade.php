@if(!Auth::user() or Auth::user()->level!=0)
<?php
    header("http/1.1 404 Not Found");
    exit();
?>
@endif