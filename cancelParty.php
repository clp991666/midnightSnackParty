<?php
require_once 'dbconfig.php';
session_start();
$sql="delete from `party` where pid={$_GET["pid"]}";
$db->query($sql);
?>