<?php
require_once 'dbconfig.php';
$timeout = isset($_GET['timeout']) ? intval($_GET['timeout']) : 0;
$timeout += time();
$from = empty($_GET['from']) ? '' : " and id > {$_GET['from']}";
$pid = $_GET['pid'];

$sql = $db->prepare("select id, uname, msg, unix_timestamp(time) as t from chat
                     inner join user using(sid)
                     where pid = {$_GET['pid']} $from
                     order by time");
$sql->bind_result($id, $uname, $msg, $t);
$arr = array();
do {
    if (!$sql->execute()) {
        header('HTTP/1.1 500 Internal Server Error');
        echo $db->error;
    }
    while ($sql->fetch())
        $arr[] = array('id' => $id, 'uname' => $uname, 'msg' => $msg, 'time' => date('H:m', $t));
    if (count($arr) > 0)
        break;
    else
        sleep(3);
} while (time() < $timeout);

header("Content-Type: application/json");
echo json_encode($arr);