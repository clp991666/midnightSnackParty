<?php
// define('DB_SERVER', 'mysql.comp.polyu.edu.hk');
// define('DB_USERNAME', '13003551d');    // DB username
// define('DB_PASSWORD', 'knjqvkvr');    // DB password
// define('DB_DATABASE', '13003551d');
define('DB_SERVER', '192.168.0.100');
define('DB_USERNAME', 'me');    // DB username
define('DB_PASSWORD', 'lkho');    // DB password
define('DB_DATABASE', '13003551d');      // DB name
//mysql_query("SET NAMES UTF8");
$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die( "Unable to connect");
?>