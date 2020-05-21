<?php
require_once("database.php");

$id = 399;
if( isset($_POST['action']) && ($_POST['action'] == 'edit' ) ) {
	
	$headerHeading	  = DBin($_POST['headerHeading']);
	$headerText		  = DBin($_POST['headerText']);
    
	$metaTitle 		  = DBin($_POST['metaTitle']);
	$metaKeys 	      = DBin($_POST['metaKeys']);
	$metaDescr        = DBin($_POST['metaDescr']);
	
    $image_sql = '';
	if( !empty( $_FILES['headerBGImage']['name'] ) )
	{
		$uploadDir = IMAGES_PATH.'pages/';
		$bgImage = time().$_FILES['headerBGImage']['name'];
		$uploadfile = $uploadDir . time().basename($_FILES['headerBGImage']['name']);
		move_uploaded_file($_FILES['headerBGImage']['tmp_name'], $uploadfile);
        $image_sql .= ", headerBGImage='$bgImage'";
	}
	
	$Sql = "update custom_pages set herderHeading='$headerHeading', headerText='$headerText', metatitle='$metaTitle', metakeywords='$metaKeys', metadescription='$metaDescr' $image_sql where id='$id' limit 1";
	
	$res = mysql_query($Sql) or die(mysql_error());
	if($res) {
        $_SESSION['msg'] = '<div class="success">Record saved successfully...</div>';
        header("Location: products_seo.php");
        exit;
    }
}

$Sql = mysql_query("select * from custom_pages where id='$id' limit 1") or die(mysql_query());
$Res = mysql_fetch_assoc($Sql);

$headerBGImage   = DBout($Res['headerBGImage']);
$herderHeading	 = DBout($Res['herderHeading']);
$headerText 	 = DBout($Res['headerText']);

$metatitle 		 = DBout($Res['metatitle']);
$metakeywords 	 = DBout($Res['metakeywords']);
$metadescription = DBout($Res['metadescription']);

if( !empty($headerBGImage) ) {
    $bgImage  = '<tr><td colspan="2" align="center"><a href="custom_pages.php?id='.$id.'&del='.$headerBGImage.'"><img src="images/del-image.png" border="0" align="texttop" /></a>';
	$bgImage .= '<img src="../images/pages/' . $headerBGImage.'" align="texttop" /></td></tr>';
}

if( isset($_GET['del']) ) {
    $del = urldecode($_GET['del']);
    mysql_query("update custom_pages set headerBGImage='' where id='$id' limit 1") or die(mysql_error());
    @unlink(IMAGES_PATH.'pages/'.$del);
    header("Location: products_seo.php");
    exit;
}

require_once("header.php");
if( isset($_SESSION['msg']) ) {
    echo $_SESSION['msg'];
    session_unregister('msg');
}

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

    <tr><td colspan="2" align="right" class="bc_heading">Custom Pages</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>

    <form method="post" name="bc_form" enctype="multipart/form-data" action="">
    <input type="hidden" name="action" value="edit" />
    
    <tr>
        <td class="bc_input_td" align="right"><strong>Page Banner:</strong></td>
        <td class="bc_input_td"><input type="file" name="headerBGImage" /></td>
    </tr><?php echo $bgImage; ?>
    <tr>
        <td class="bc_input_td" align="right"><strong>Banner Heading:</strong></td>
        <td class="bc_input_td"><input type="text" name="headerHeading" value="<?php echo $herderHeading; ?>" style="width:400px;" /></td>
    </tr>
    <tr>
        <td class="bc_input_td" align="right"><strong>Banner Text:</strong></td>
        <td class="bc_input_td"><input type="text" name="headerText" value="<?php echo $headerText; ?>" style="width:400px;" /></td>
    </tr>
    <tr>
        <td class="bc_input_td" align="right"><strong>Meta Title:</strong></td>
        <td class="bc_input_td"><input type="text" name="metaTitle" value="<?php echo $metatitle; ?>" style="width:400px;" /></td>
    </tr>
    <tr>
        <td class="bc_input_td" align="right"><strong>Meta Keywords:</strong></td>
        <td class="bc_input_td"><textarea name="metaKeys" style="width:600px;height:60px;"><?php echo $metakeywords; ?></textarea></td>
    </tr>
    <tr>
        <td class="bc_input_td" align="right"><strong>Meta Description:</strong></td>
        <td class="bc_input_td"><textarea name="metaDescr" style="width:600px;height:60px;"><?php echo $metadescription; ?></textarea></td>
    </tr>
    <tr><td colspan="2" align="center"><input name="submit" type="submit" value="Save" class="bc_button" /></td></tr>
	</form>
    
</table>

<?php require_once("footer.php"); ?>