<?php
require_once 'dbconfig.php';
session_start();
$sql="select * from `user` where `sid`='".$_POST["inputSID"]."' and `pwd`='".$_POST["inputPassword"]."'";
$result = $db->query($sql);
if ($result->num_rows > 0){
    $_SESSION["SID"]=$_POST["inputSID"];
    header( "Location: dashboard.php" );
}else{
    header( "Location: login.php?login=fail" );
}
?>