<?php
require_once("database.php");

$id = (int)$_GET['id'];
if( isset($_POST['action']) && ($_POST['action'] == 'save' ) ) {
	
	$q = DBin($_POST['q']);
    $a = DBin($_POST['a']);	
	
	$Sql = "insert into faq (question,answer) values ('$q', '$a')";
	
	$res = mysql_query($Sql) or die(mysql_error());
	if($res) {
        $_SESSION['msg'] = '<div class="success">FAQ saved successfully...</div>';
        header("Location: faq.php");
        exit;
    }
}

if( isset($_POST['action']) && ($_POST['action'] == 'edit' ) ) {
	
	$q = DBin($_POST['q']);
    $a = DBin($_POST['a']);
	
	
	$Sql = "update faq set question='$q',answer='$a' where id='$id' limit 1";
	
	$res = mysql_query($Sql) or die(mysql_error());
	if($res) {
        $_SESSION['msg'] = '<div class="success">FAQ saved successfully...</div>';
        header("Location: faq.php?id=".$id);
        exit;
    }
}

$action = 'save';
if( isset($_GET['id']) ) {
	$id = (int)$_GET['id'];
	$Sql = mysql_query("select * from faq where id='$id' limit 1") or die(mysql_query());
	$Res = mysql_fetch_assoc($Sql);
	
	$q = DBout($Res['question']);
	$a = DBout($Res['answer']);
	$action = 'edit';
}

require_once("header.php");
if( isset($_SESSION['msg']) ) {
    echo $_SESSION['msg'];
    session_unregister('msg');
}
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

    <tr><td colspan="2" align="right" class="bc_heading">FAQ's</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>

    <form method="post" name="bc_form" enctype="multipart/form-data" action="">
    <input type="hidden" name="action" value="<?php echo $action; ?>" />
    
    <tr>
        <td class="bc_input_td" align="right"><strong>Question:</strong></td>
        <td class="bc_input_td"><input type="text" name="q" value="<?php echo $q; ?>" style="width:400px;" /></td>
    </tr>
    <tr valign="top">
        <td class="bc_input_td" align="right"><br /><strong>Answer:</strong></td>
        <td class="bc_input_td"><textarea name="a" style="width:600px;height:300px;" id="descr"><?php echo $a; ?></textarea></td>
    </tr>
    <tr><td>&nbsp;</td><td><input name="submit" type="submit" value="Save" class="bc_button" /></td></tr>
	</form>
    
</table>

<?php require_once("footer.php"); ?>

<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "exact",
	elements : "descr",
	theme : "advanced",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,forecolor,backcolor,bullist,numlist,outdent,indent,blockquote,anchor,cleanup",
	theme_advanced_buttons2 : "cut,copy,paste,styleselect,formatselect,fontselect,fontsizeselect,hr,code,help,insertimage,image",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
    relative_urls : false,
    document_base_url : "<?php echo ABSOLUTE_PATH; ?>",
	plugins : "inlinepopups,imagemanager",
});
</script>
