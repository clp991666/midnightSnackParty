<?php
error_reporting(0);
mysql_query("SET NAMES UTF8");
require_once 'dbconfig.php';
$sql = "SELECT * FROM `party`WHERE `pid`=".$_GET["pid"];
$result=mysql_query($sql);
if (mysql_num_rows($result)>0){
$json = '[';
  while ($row = mysql_fetch_assoc($result)) 
    $json=$json.'{"time":"'.$row["time"].'","res":"'.$row["restaurant"].'","target":"'.$row["target"].'","ownerId":"'.$row["ownerId"].'","current":"'.$row["current"].'"},';
$json=rtrim($json, ",");
$json=$json.']';
}
echo $json;
?>