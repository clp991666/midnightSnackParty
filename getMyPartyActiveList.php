<?php
require_once 'dbconfig.php';
$sql = "select `party`.`pid`, unix_timestamp(`time`) as `t`, `restaurant`, `current`, `target`, `ownerId` from `party`
        where `time` >= now()
          and `pid` in (select `pid` from `party` where `ownerId` = '{$_GET["sid"]}'
                        UNION
                        select `pid` from `request` where `sid` = '{$_GET["sid"]}')
        ORDER BY `time` ASC";
$result = $db->query($sql);
$json = array();
while ($row = $result->fetch_assoc()) {
    $row['time'] = $row['t'];
    $json[] = $row;
}
echo json_encode($json);
?>