<?php
require_once("database.php");
$serializeNav = serialize($_POST['recordsArray']);

$type = (trim($_GET['type']) == 'bottom')?'bottom':'top';
$where = " where type='$type' limit 1";
$already_nav = @mysql_result(mysql_query("SELECT count(*) FROM topNav $where"),0);

if($already_nav < 1) {
  $sql = "INSERT INTO topNav (navArray,type) values('$serializeNav','$type')";
}
else {
  $sql = "UPDATE topNav SET navArray = '$serializeNav' $where";
}

$res = mysql_query($sql);
//echo $sql;

if($res == 1)
  echo "Navigation order saved";
?>
