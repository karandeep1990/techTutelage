<?php
require_once("database.php");
include("../resize-class.php");

$action = '';
if( isset($_POST['productDesc']) && isset($_POST['productTitle']) ) {

	$Image = "";
	if(isset($_FILES['productImage']) && ($_FILES['productImage'] != ''))
	{		  
		  if( !empty( $_FILES['productImage']['name'] ) ) {
			$uploadDir = "/home/checkpet/public_html/ecolocap/images/uploads/";
			$Image = time().$_FILES['productImage']['name'];
			$uploadfile = $uploadDir . time().basename($_FILES['productImage']['name']);
			$upload_image = move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadfile);

			if($upload_image == 1)
			{
				$resizeObj = new resize($uploadfile);
				$resizeObj -> resizeImage(146, 126, 'exact');
				$resizeObj -> saveImage($uploadfile, 100);
			}		
		  }
	}
	
	
	$productTitle	= DBin($_POST['productTitle']);
	$productDesc 	= DBin($_POST['productDesc']);
	$href 		= getRewriteString($productTitle);
	$cp_mt 	    = DBin($_POST['metatitle']);
	$cp_mk 	    = DBin($_POST['metakeywords']);
	$cp_md 	    = DBin($_POST['metadescription']);
    	
	if( isset($_POST['upd_id']) && ( (int)$_POST['upd_id'] != 0 ) ) {
		if($Image == '')
		{
			$Image = @mysql_result(mysql_query("SELECT image FROM products WHERE id = '".$_POST['upd_id']."' "),0);
		}
		
		$upd_id = (int)$_POST['upd_id'];
		$fieldNames  = array('title','href','image','descr','metatitle','metaKeys','metaDescr');
		$fieldValues = array($productTitle,$href,$Image,$productDesc,$cp_mt,$cp_mk,$cp_md);
		$Sql = BuildSQL("products", "update", $fieldNames, $fieldValues, "id='$upd_id' limit 1");
        $New = 0;
	}
	else {
		$fieldNames  = array('title','href','image','descr','dated','metatitle','metaKeys','metaDescr');
		$fieldValues = array($productTitle,$href,$Image,$productDesc,date('Y-m-d H:i'),$cp_mt,$cp_mk,$cp_md);
		$Sql = BuildSQL("products", "insert", $fieldNames, $fieldValues, "");
        $New = 1;
	}
	
	
	$res = mysql_query($Sql) or die(mysql_error());
	if($res) {
	   $_SESSION['msg'] = 'Product saved successfully...';
       if( $New == 1 ) {
       	   $_SESSION['msg'] = 'Product added successfully...';
    	   header("Location: products.php");
           ob_flush();
           exit;
        }
    }
}
require_once("header.php");

if( isset($_SESSION['msg']) ) {
    echo '<div class="success">'. $_SESSION['msg'] .'</div>';
    session_unregister('msg');
}

if( isset($_GET['id']) ) {
	$id = (int)$_GET['id'];
	$Sql = mysql_query("select * from products where id='$id' limit 1") or die(mysql_query());
	$Res = mysql_fetch_assoc($Sql);
	
	$productTitle  = DBout($Res['title']);
	$descr 	    = DBout($Res['descr']);
	$Image  = DBout($Res['image']);
	$cp_mt 		= DBout($Res['metaTitle']);
	$cp_mk 		= DBout($Res['metaKeys']);
	$cp_md 		= DBout($Res['metaDescr']);
    $action = '<input type="hidden" name="upd_id" value="'.$id.'" />';
}
?>



<link type="text/css" href="jscripts/jquery_ui/css/overcast/jquery-ui-1.7.3.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="jscripts/jquery_ui/js/jquery-ui-1.7.3.custom.min.js"></script>
<script type="text/javascript">
	$(function() {
		$( "#datepicker" ).datepicker({dateFormat:'mm/dd/yy'});
	});
</script>



<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

    <tr><td colspan="2" align="right" class="bc_heading">Create / Edit Product</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>

    <form method="post" name="bc_form" enctype="multipart/form-data" action="">
    <?php echo $action; ?>
  
    <tr>
        <td class="bc_input_td" align="right"><strong>Product Title:</strong></td>
        <td class="bc_input_td"><input type="text" name="productTitle" value="<?php echo $productTitle; ?>" style="width:400px;" /> Text after | will turn green</td>
    </tr>
    <tr valign="top">
        <td class="bc_input_td" align="right"><br /><strong>Product Image:</strong></td>
        <td class="bc_input_td">
        	<table style="width:100%; padding-top:5px;">
        		<tr>
        			<td style="width:40%;" valign="top"> <input type="file" name="productImage" style="width:300px;" /> </td>
        			<td> <?php if($Image != '') { echo "<img src='../images/uploads/$Image' border=0 height='60' style='border:1px black solid;' />"; } ?> </td>
        		</tr>
        	</table>
        </td>	
    </tr>
    <tr valign="top">
        <td class="bc_input_td" align="right"><br /><strong>Product Description:</strong></td>
        <td class="bc_input_td"><textarea name="productDesc" style="width:600px;height:300px;" id="descr"><?php echo $descr; ?></textarea></td>
    </tr>
    <tr>
        <td class="bc_input_td" align="right"><strong>Meta Title:</strong></td>
        <td class="bc_input_td"><input type="text" name="metatitle" value="<?php echo $cp_mt; ?>" style="width:400px;" /></td>
    </tr>
    <tr>
        <td class="bc_input_td" align="right"><strong>Meta Keywords:</strong></td>
        <td class="bc_input_td"><textarea name="metakeywords" style="width:600px;height:60px;"><?php echo $cp_mk; ?></textarea></td>
    </tr>
    <tr>
        <td class="bc_input_td" align="right"><strong>Meta Description:</strong></td>
        <td class="bc_input_td"><textarea name="metadescription" style="width:600px;height:60px;"><?php echo $cp_md; ?></textarea></td>
    </tr>
    <tr><td colspan="2" align="center"><input name="submit" type="submit" value="Save" class="bc_button" /></td></tr>
	</form>
    
</table>

<?php require_once("footer.php"); ?>
<link rel="stylesheet" href="js/cal.css" type="text/css" media="print, projection, screen" />
<script type="text/javascript" src="js/cal.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "exact",
	elements : "descr",
	theme : "advanced",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,forecolor,backcolor,bullist,numlist,outdent,indent,blockquote,anchor,cleanup",
	theme_advanced_buttons2 : "cut,copy,paste,styleselect,formatselect,fontselect,fontsizeselect,hr,code,help",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	plugins : 'inlinepopups',
});
</script>
