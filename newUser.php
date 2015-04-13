<?php
require_once 'dbconfig.php';
require_once 'server_setting.php';
session_start();
$sql="insert into `user` (sid, pwd, school, uname) values ('".$_POST["inputSID"]."','".$_POST["inputPassword"]."','".$_POST["inputU"]."','".$_POST["inputName"]."')";
if ($result=mysql_query($sql)){
    $_SESSION["SID"]=$_POST["inputSID"];
    header("Location: ".$server_root."dashboard.php");
}else{
    header("Location: ".$server_root."login.php?register=fail");
}
?>