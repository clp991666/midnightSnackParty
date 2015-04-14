<?php
require_once 'dbconfig.php';
$sql = "select `party`.`pid`, unix_timestamp(`time`) as `t`, `restaurant`, `current`, `target`, `ownerId` from `party` where `time` > now()";
$result = $db->query($sql);
$json = array();
while ($row = $result->fetch_assoc()) {
    $row['time'] = $row['t'];
    $json[] = $row;
}
echo json_encode($json);
?>