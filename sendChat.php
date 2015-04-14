<?php
session_start();
if (!isset($_SESSION["SID"])) {
    header("HTTP/1.1 403 Unauthorized");
    exit();
}

require_once 'dbconfig.php';
$pid = $_GET['pid'];
$from = empty($_GET['from']) ? '' : " and id > {$_GET['from']}";
if (isset($_POST['msg']) && $_POST['msg'] != '') {
    $result = $db->query("insert into chat (pid, sid, msg) values ({$_GET['pid']}, '{$_SESSION["SID"]}', '" . $db->escape_string($_POST['msg']) . "')");
    if (!$result) {
        header("HTTP/1.1 500 Internal Server Error");
        echo $db->error;
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo 'POST sendChat.php?pid=123&from=456 { msg: "message" }';
}