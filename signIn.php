<?php
require_once 'dbconfig.php';
require_once 'server_setting.php';
session_start();
$sql="select * from `user` where `sid`='".$_POST["inputSID"]."' and `pwd`='".$_POST["inputPassword"]."'";
$result=mysql_query($sql);
if (mysql_num_rows($result)>0){
    $_SESSION["SID"]=$_POST["inputSID"];
    header( "Location: ".$server_root."dashboard.php" );
}else{
    header( "Location: ".$server_root."login.php?login=fail" );
}
?>