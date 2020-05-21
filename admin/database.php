<?php
session_start();
require('../includes/config.php');
$Conn_db = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
mysql_select_db(DB_NAME, $Conn_db);

include_once("functions.php");

define("MAX_RECORD_PER_PAGE",10);

define("HORIZONTAL_MENU",false);

?>
