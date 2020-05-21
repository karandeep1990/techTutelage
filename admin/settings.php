<?php
require_once("database.php");

if( isset($_POST['config']) ) {
	
	foreach( $_POST['config'] as $id => $val ) {
		$val = DBin($val);
		
		mysql_query("update settings set value='$val' where id='$id' limit 1");
		if( mysql_affected_rows() == 0 ) {
			mysql_query("insert into settings (id,value) values ('$id','$val')");
		}
	}
	$_SESSION['msg'] = '<div class="success">Settings updated successfully.</div>';
	header("Location: settings.php");
	exit;
}

require_once("header.php");
if( isset($_SESSION['msg']) ) {
    echo $_SESSION['msg'];
    session_unregister('msg');
}
?>
<h1 style="padding-top: 10px;" class="bc_heading">General Settings</h1>

<form action="settings.php" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="1" width="90%" align="center">
    <tr bgcolor="#CCC">
		<th width="20%" align="left" style="padding: 5px;">Text For</th>
		<th width="70%" align="left" style="padding: 5px;">Text Value</th>
	</tr>
    <tr><td height="1" bgcolor="#CCCCCC" colspan="2"></td></tr>
	<tr>
		<td><strong>&nbsp; Header Email Address</strong></td>
		<td style="padding: 5px;">&nbsp; <input type="text" style="width:300px;" name="config[1]" value="<?php echo config(1); ?>" /></td>
	</tr>
	<tr>
		<td align="left">&nbsp;</td>
		<td style="padding:10px;" align="left">&nbsp; <input type="submit" value="Save Changes" style="width:120px;" /></td>
	</tr>
</table>
</form>
<?php require_once("footer.php"); ?>