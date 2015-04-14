<?php
require_once 'dbconfig.php';
session_start();
$sql = "insert into `user` (sid, pwd, school, uname) values ('{$_POST["inputSID"]}','{$_POST["inputPassword"]}','{$_POST["inputU"]}','{$_POST["inputName"]}')";
if ($result = $db->query($sql)) {
    $_SESSION["SID"] = $_POST["inputSID"];
    header("Location: dashboard.php");
} else {
    header("Location: login.php?register=fail");
}
?>