<?php
session_start();
session_destroy();
require_once 'server_setting.php';
header( "Location: ".$server_root."login.php" );
?>