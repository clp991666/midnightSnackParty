<?php
//require_once 'dbconfig.php';
session_start();
$sql="insert into `user` (sid, pwd, school, uname) values ('".$_POST["inputSID"]."','".$_POST["inputPassword"]."','".$_POST["inputU"]."','".$_POST["inputName"]."')";
echo $sql;
// $result=mysql_query($sql);
// if (mysql_num_rows($result)>0){
//     $_SESSION["SID"]=$_POST["inputSID"];
//     header( "Location: http://localhost/comp3121Project/dashboard.php" );
// }else{
//     header( "Location: http://localhost/comp3121Project/login.php?login=fail" );
// }
?>