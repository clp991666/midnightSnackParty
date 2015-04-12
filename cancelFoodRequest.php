<?php
require_once 'dbconfig.php';
session_start();
$sql="delete from `request` where rid=".$_GET["rid"];
mysql_query($sql);
$sql="update `party` set current=current-".$_GET["amount"]." where `pid`=".$_GET["pid"];
mysql_query($sql);
?>