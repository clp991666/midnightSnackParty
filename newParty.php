<?php
//error_reporting(0);
require_once 'dbconfig.php';
$time = time() + ($_GET["time"] * 60);
$sql = "insert into `party` (time, restaurant, target, `ownerId`)
        VALUES (FROM_UNIXTIME($time),'{$_GET["res"]}','{$_GET["goal"]}','{$_GET["ownerId"]}')";
$db->query($sql);
?>