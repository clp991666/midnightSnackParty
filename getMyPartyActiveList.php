<?php
error_reporting(0);
mysql_query("SET NAMES UTF8");
require_once 'dbconfig.php';
$sql = "select `party`.`pid`, unix_timestamp(`time`) as `t`, `restaurant`, `current`, `target`, `ownerId` from `party`
        where `time` >= now()
          and `pid` in (select `pid` from `party` where `ownerId` = '{$_GET["sid"]}'
                        UNION
                        select `pid` from `request` where `sid` = '{$_GET["sid"]}')
        ORDER BY `time` ASC";
$result = mysql_query($sql);
$json = array();
if (mysql_num_rows($result) > 0){
  while ($row = mysql_fetch_assoc($result)) {
    $row['time'] = $row['t'];
    $json[] = $row;
  }
}
echo json_encode($json);
?>