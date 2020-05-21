<?php
require_once("database.php"); 
$id = $_GET['id'];
$table = $_GET['table'];
$link  = $_GET['link'];

if( $table == 'sections' ) {
    mysql_query("delete from sections_contents where section_id='$id'");
}

$sql = "delete from $table where id=$id";
$res = mysql_query($sql);

header("Location: list.php?link=$link&msg=Successfully+deleted");

?>