<?php
require_once 'dbconfig.php';
session_start();
$sql="delete from `request` where rid={$_GET["rid"]}";
$db->query($sql);
$sql="update `party` set current=current-{$_GET["amount"]} where `pid`={$_GET["pid"]}";
$db->query($sql);
?>