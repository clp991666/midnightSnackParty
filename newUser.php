<?php
require_once 'dbconfig.php';
session_start();
$sql="insert into `user` (sid, pwd, school, uname) values ('".$_POST["inputSID"]."','".$_POST["inputPassword"]."','".$_POST["inputU"]."','".$_POST["inputName"]."')";
if ($result=mysql_query($sql)){
    $_SESSION["SID"]=$_POST["inputSID"];
    header("Location: http://localhost/comp3121Project/dashboard.php");
}else{
    header("Location: http://localhost/comp3121Project/login.php?register=fail");
}
?>