<?php
// define('DB_SERVER', 'mysql.comp.polyu.edu.hk');
// define('DB_USERNAME', '13003551d');    // DB username
// define('DB_PASSWORD', 'knjqvkvr');    // DB password
// define('DB_DATABASE', '13003551d'); 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');    // DB username
define('DB_PASSWORD', 'password');    // DB password
define('DB_DATABASE', 'comp3121');      // DB name
mysql_query("SET NAMES UTF8");
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
?>