<?php
error_reporting(0);
mysql_query("SET NAMES UTF8");
date_default_timezone_set("Asia/Hong_Kong"); 
$time=time()+($_GET["time"]*60);
require_once 'dbconfig.php';
$sql="insert into `party` (time, restaurant, target, `ownerId`) VALUES ('".date("Y-m-d H:i:s", $time)."','".$_GET["res"]."','".$_GET["goal"]."','".$_GET["ownerId"]."')";
mysql_query($sql);
?>