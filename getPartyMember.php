<?php
require_once 'dbconfig.php';
$sql = "SELECT * FROM `request`,`user` WHERE `request`.`sid` = `user`.`sid` and `pid`=" . $_GET["pid"];
$result = $db->query($sql);
$json = arra();
while ($row = $result->fetch_assoc())
    $json[] = $row;

echo json_encode($json);
?>