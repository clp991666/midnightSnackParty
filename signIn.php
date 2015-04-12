<?php
require_once 'dbconfig.php';
session_start();
$sql="select * from `user` where `sid`='".$_POST["inputSID"]."' and `pwd`='".$_POST["inputPassword"]."'";
$result=mysql_query($sql);
if (mysql_num_rows($result)>0){
    $_SESSION["SID"]=$_POST["inputSID"];
    header( "Location: http://localhost/comp3121Project/dashboard.php" );
}else{
    header( "Location: http://localhost/comp3121Project/login.php?login=fail" );
}
?>