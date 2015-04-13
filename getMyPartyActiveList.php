<?php
error_reporting(0);
mysql_query("SET NAMES UTF8");
require_once 'dbconfig.php';
$sql = "select `party`.`pid`, `time`, `restaurant`, `current`, `target`, `ownerId` from `party` where `time`>now() and `pid` in (select `pid` from `party` where `ownerId`='".$_GET["sid"]."' UNION select `pid` from `request` where `sid`='".$_GET["sid"]."') ORDER BY `time` ASC";
$result=mysql_query($sql);
$json = '[';
if (mysql_num_rows($result)>0){
  while ($row = mysql_fetch_assoc($result)) 
    $json=$json.'{"pid":"'.$row["pid"].'","time":"'.$row["time"].'","restaurant":"'.$row["restaurant"].'","current":"'.$row["current"].'","target":"'.$row["target"].'","ownerId":"'.$row["ownerId"].'"},';
}
$json=rtrim($json, ",");
$json=$json.']';
echo $json;
?>