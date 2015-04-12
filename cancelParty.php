<?php
require_once 'dbconfig.php';
session_start();
$sql="delete from `party` where pid=".$_GET["pid"];
$result=mysql_query($sql);
?>