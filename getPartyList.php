<?php
error_reporting(0);
require_once 'dbconfig.php';
$sql = "select `party`.`pid`, `time`, `restaurant`, `current`, `target` from `party`";
$result=mysql_query($sql);
$json = '[';
if (mysql_num_rows($result)>0){
  while ($row = mysql_fetch_assoc($result)) 
    $json=$json.'{"pid":"'.$row["pid"].'","time":"'.$row["time"].'","restaurant":"'.$row["restaurant"].'","current":"'.$row["current"].'","target":"'.$row["target"].'"},';
}
$json=rtrim($json, ",");
$json=$json.']';
echo $json;
?>