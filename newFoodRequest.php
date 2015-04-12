<?php
error_reporting(0);
mysql_query("SET NAMES UTF8");
date_default_timezone_set("Asia/Hong_Kong"); 
$time=time()+($_GET["time"]*60);
require_once 'dbconfig.php';
$sql="insert into `request` (pid, sid, food, amount) VALUES ('".$_GET["pid"]."','".$_GET["sid"]."','".$_GET["food"]."','".$_GET["amount"]."')";
mysql_query($sql);
$sql="update `party` set current=current+".$_GET["amount"]." where `pid`=".$_GET["pid"];
mysql_query($sql);
?>