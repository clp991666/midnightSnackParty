<?php
require_once 'dbconfig.php';
$sql = "SELECT *, unix_timestamp(`time`) as `t` FROM `party` WHERE `pid` = {$_GET["pid"]}";
$result = $db->query($sql);
$json = array();
while ($row = $result->fetch_assoc($result))
    $json[] = array(
        "time"    => $row['t'],
        "res"     => $row["restaurant"],
        "target"  => $row["target"],
        "ownerId" => $row["ownerId"],
        "current" => $row["current"]
    );
echo json_encode($json);
?>