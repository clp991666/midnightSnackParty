<?php
error_reporting(0);
mysql_query("SET NAMES UTF8");
require_once 'dbconfig.php';
$sql = "SELECT *, unix_timestamp(`time`) as `t` FROM `party` WHERE `pid` = {$_GET["pid"]}";
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
  $json = array();
  while ($row = mysql_fetch_assoc($result)) 
    $json[] = array(
      "time" => $row['t'],
      "res" => $row["restaurant"],
      "target" => $row["target"],
      "ownerId" => $row["ownerId"],
      "current" => $row["current"]
    );
}
echo json_encode($json);
?>