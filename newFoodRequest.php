<?php
require_once 'dbconfig.php';
$sql = "insert into `request` (pid, sid, food, amount) VALUES ('{$_GET["pid"]}','{$_GET["sid"]}','{$_GET["food"]}','{$_GET["amount"]}')";
$db->query($sql);
$sql = "update `party` set current=current+{$_GET["amount"]} where `pid`={$_GET["pid"]}";
$db->query($sql);
?>