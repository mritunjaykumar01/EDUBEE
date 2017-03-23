<?php 

$link = $_SERVER['PHP_SELF'];
echo $link;
$test = "123456789";
$hash = md5($test);
echo $hash."<br>";
$new = md5($hash);
echo $new;

 ?>