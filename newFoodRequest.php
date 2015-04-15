<?php
require_once 'dbconfig.php';
session_start();
$sql = "insert into `request` (pid, sid, food, amount) VALUES ('{$_GET["pid"]}','{$_SESSION["SID"]}','{$_GET["food"]}','{$_GET["amount"]}')";
$db->query($sql);
$sql = "update `party` set current=current+{$_GET["amount"]} where `pid`={$_GET["pid"]}";
$db->query($sql);
?>