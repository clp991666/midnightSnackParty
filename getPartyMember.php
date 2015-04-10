<?php
error_reporting(0);
require_once 'dbconfig.php';
$sql = "SELECT * FROM `request`,`user` WHERE `request`.`sid` = `user`.`sid` and `pid`=".$_GET["pid"];
$result=mysql_query($sql);
if (mysql_num_rows($result)>0){
$json = '[';
  while ($row = mysql_fetch_assoc($result)) 
    $json=$json.'{"rid":"'.$row["rid"].'","sid":"'.$row["sid"].'","food":"'.$row["food"].'","amount":"'.$row["amount"].'","uname":"'.$row["uname"].'"},';
$json=rtrim($json, ",");
$json=$json.']';
}
echo $json;
?>