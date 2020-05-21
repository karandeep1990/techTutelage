<?php
require_once("database.php");
include("../resize-class.php");

$current_url = $_SERVER['SCRIPT_FILENAME'];
$serverPath = str_replace("/admin/custom_pages.php","",$current_url);
$uploadDir = $serverPath."/images/uploads/";

$id = (int)$_GET['id'];

if(isset($_GET['delImg']) && $_GET['delImg'] != '')
{
	$imgName = mysql_result(mysql_query("SELECT headerImage FROM custom_pages WHERE id = '".$id."' "),0);
	mysql_query("UPDATE custom_pages SET headerImage = '' WHERE id = '".$id."' ");
	@unlink($uploadDir.$imgName);
	$_SESSION['msg'] = 'Image Deleted successfully...';
}

if( isset($_POST['action']) && ($_POST['action'] == 'save' ) ) {
	if(isset($_SESSION['msg'])) {
		unset($_SESSION['msg']);//Added by Karandeep for enable editing
	}
  $pageTitle 		  = DBin($_POST['pageTitle']);
  $pageTitle2 		  = DBin($_POST['pageTitle2']);
  $headerHeading	  = DBin($_POST['headerHeading']);
  $headerText		  = DBin($_POST['headerText']);
  $contents		  = DBin($_POST['contents']);
  $mainHeading      = DBin($_POST['mainHeading']);
  $subHeading       = DBin($_POST['subHeading']);

  $seoName          = getRewriteString($pageTitle);
  $metaTitle 		  = DBin($_POST['metaTitle']);
  $metaKeys 	      = DBin($_POST['metaKeys']);
  $metaDescr        = DBin($_POST['metaDescr']);

  $bgImage = "";
  if( !empty( $_FILES['headerBGImage']['name'] ) ) {
    $uploadDir = IMAGES_PATH.'pages/';
    $bgImage = time().$_FILES['headerBGImage']['name'];
    $uploadfile = $uploadDir . time().basename($_FILES['headerBGImage']['name']);
    move_uploaded_file($_FILES['headerBGImage']['tmp_name'], $uploadfile);
  }

  $Image = "";
  if( !empty( $_FILES['img1']['name'] ) ) {
    $uploadDir = $serverPath."/images/uploads/";
    $Image = time().$_FILES['img1']['name'];
    $uploadfile = $uploadDir . time().basename($_FILES['img1']['name']);
    move_uploaded_file($_FILES['img1']['tmp_name'], $uploadfile);
    
    $resizeObj = new resize($uploadfile);
	$resizeObj -> resizeImage(571, 239, 'exact');
	$resizeObj -> saveImage($uploadfile, 100);
  }

  $Sql = "insert into custom_pages (seoname, pagetitle,pagetitle2, mainHeading, subHeading, contents, headerBGImage, headerImage, herderHeading, headerText, metatitle, metakeywords, metadescription)
        values ('$seoName', '$pageTitle', '$pageTitle2', '$mainHeading', '$subHeading', '$contents', '$bgImage', '$Image', '$headerHeading' ,'$headerText' ,'$metaTitle' ,'$metaKeys', '$metaDescr')";

  $res = mysql_query($Sql) or die(mysql_error());
  if($res) {
    $_SESSION['msg'] = 'Record Insert successfully...';
    header("Location: custom_pages.php");
    exit;
  }
}


if( isset($_POST['action']) && ($_POST['action'] == 'edit' ) ) {

	if(isset($_SESSION['msg'])) {
		unset($_SESSION['msg']);//Added by Karandeep for enable editing
	}
  $pageTitle 		  = DBin($_POST['pageTitle']);
  $pageTitle2 		  = DBin($_POST['pageTitle2']);
  $headerHeading	  = DBin($_POST['headerHeading']);
  $headerText		  = DBin($_POST['headerText']);
  $contents		  = DBin($_POST['contents']);
  $mainHeading      = DBin($_POST['mainHeading']);
  $subHeading       = DBin($_POST['subHeading']);

  $metaTitle 		  = DBin($_POST['metaTitle']);
  $metaKeys 	      = DBin($_POST['metaKeys']);
  $metaDescr        = DBin($_POST['metaDescr']);

  $image_sql = '';
  if( !empty( $_FILES['headerBGImage']['name'] ) ) {
    $uploadDir = IMAGES_PATH.'pages/';
    $bgImage = time().$_FILES['headerBGImage']['name'];
    $uploadfile = $uploadDir . time().basename($_FILES['headerBGImage']['name']);
    move_uploaded_file($_FILES['headerBGImage']['tmp_name'], $uploadfile);
    $image_sql .= ", headerBGImage='$bgImage'";
  }

  if( !empty( $_FILES['img1']['name'] ) ) {
    $uploadDir = $serverPath."/images/uploads/";
    $Image = time().$_FILES['img1']['name'];
    $uploadfile = $uploadDir . time().basename($_FILES['img1']['name']);
    move_uploaded_file($_FILES['img1']['tmp_name'], $uploadfile);
    
    $resizeObj = new resize($uploadfile);
	$resizeObj -> resizeImage(571, 239, 'exact');
	$resizeObj -> saveImage($uploadfile, 100);
	
    $image_sql .= ", headerImage='$Image'";
  }

  $Sql = "update custom_pages set pagetitle='$pageTitle', pagetitle2='$pageTitle2', mainHeading='$mainHeading', subHeading='$subHeading', contents='$contents', herderHeading='$headerHeading', headerText='$headerText', metatitle='$metaTitle', metakeywords='$metaKeys', metadescription='$metaDescr' $image_sql where id='$id' limit 1";

  $res = mysql_query($Sql) or die(mysql_error());
  if($res) {
    $_SESSION['msg'] = 'Record saved successfully...';
    header("Location: custom_pages.php?id=".$id);
    exit;
  }
}

$action = 'save';
if( isset($_GET['id']) ) {
	if(isset($_SESSION['msg'])) {
		unset($_SESSION['msg']);//Added by Karandeep for enable editing
	}
  $id = (int)$_GET['id'];
  $Sql = mysql_query("select * from custom_pages where id='$id' limit 1") or die(mysql_query());

  $Res = mysql_fetch_assoc($Sql);
  
  $pagetitle 	     = DBout($Res['pagetitle']);
  $pagetitle2 	     = DBout($Res['pagetitle2']);
  $contents 	     = DBout($Res['contents']);
  $headerBGImage   = DBout($Res['headerBGImage']);
  $headerImage     = DBout($Res['headerImage']);
  $herderHeading	 = DBout($Res['herderHeading']);
  $headerText 	 = DBout($Res['headerText']);
  $mainHeading     = DBout($Res['mainHeading']);
  $subHeading      = DBout($Res['subHeading']);

  $metatitle 		 = DBout($Res['metatitle']);
  $metakeywords 	 = DBout($Res['metakeywords']);
  $metadescription = DBout($Res['metadescription']);
  $action = 'edit';

  if( !empty($headerBGImage) ) {
    $bgImage  = '<tr><td colspan="2" align="center"><a href="custom_pages.php?id='.$id.'&del='.$headerBGImage.'"><img src="images/del-image.png" border="0" align="texttop" /></a>';
    $bgImage .= '<img src="../images/pages/' . $headerBGImage.'" align="texttop" /></td></tr>';
  }

  if( !empty($headerImage) ) {
    $headImage  = '<br /><br /><a href="custom_pages.php?id='.$id.'&del='.$headerImage.'"><img src="images/del-image.png" align="texttop" border="0" /></a>';
    $headImage .= '<img src="../images/pages/'.$headerImage.'" align="texttop" />';
  }
}

if( isset($_GET['del']) ) {
  $del = urldecode($_GET['del']);
  mysql_query("update custom_pages set headerBGImage='' where id='$id' limit 1") or die(mysql_error());
  @unlink(IMAGES_PATH.'pages/'.$del);
  header("Location: custom_pages.php?id=".$id);
  exit;
}

require_once("header.php");
?>

<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">

  tinyMCE.init({
    mode : "exact",
    elements : "contents",
    theme : "advanced",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,forecolor,backcolor,bullist,numlist,outdent,indent,blockquote,anchor,cleanup",
    theme_advanced_buttons2 : "cut,copy,paste,styleselect,formatselect,fontselect,fontsizeselect,hr,code,help,insertimage,image",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,    
  });

</script>

<form method="post" name="bc_form" enctype="multipart/form-data" action="">
<input type="hidden" name="action" value="<?php echo $action; ?>" />

	<div class="container_r">
		<div class="heading_R">
		  <div class="heading_r_l"></div>
		  <div class="heading_r_c">
		    <h2>Custom Pages</h2>
		  </div>
		  <div class="heading_r_r"></div>
		</div>
		<div class="clear"></div>

		<?php if( isset($_SESSION['msg']) ) { echo '<p class="error" style="margin-top:10px;">'.$_SESSION['msg'].'</p>'; session_unregister('msg'); } ?>
		
		<div class="General_2">
		  <div class="General">
		    <div class="General_l">
		      <label>Page Title :</label>
		    </div>
		    <div class="General_r">
		      <input type="text" name="pageTitle" value="<?php echo $pagetitle; ?>" />
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <?php if(isset($_GET['id']) && $_GET['id'] == '1') { ?>
			  <div class="General">
				<div class="banner_l">
				  <label>Sub Title :</label>
				</div>
				<div class="General_r">
				  <input type="text" name="pageTitle2" value="<?php echo $pagetitle2; ?>" />
				</div>
				<div class="clear"></div>
			  </div>
			  
			  <!-- <div class="General">
				<div class="banner_l">
				  <label>Banner Heading :</label>
				</div>
				<div class="General_r">
				  <input type="text" name="headerHeading" value="<?php //echo $herderHeading; ?>" />
				</div>
				<div class="clear"></div>
			  </div>
			  
			  <div class="General">
				<div class="banner_l">
				  <label>Banner Text :</label>
				</div>
				<div class="General_r">
				  <input type="text" name="headerText" value="<?php //echo $headerText; ?>" />
				</div>
				<div class="clear"></div>
			  </div> -->
		  <?php } ?>	  
		  
		  <div class="General">
		    <div class="General_l">
		      <label>Page Contents :</label>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General">
		    <div class="General_r" style="width:460px;">
		      <textarea name="contents" id="descr"><?php echo $contents; ?></textarea>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General">
		    <div class="banner_l">
		      	<label>Upload Image :</label>
		    </div>
		    <div class="banner_r">
			    <div class="r_m">
			    	<div class="img"><?php if($headerImage != '') { echo "<img src='../images/uploads/$headerImage' border=0 width='86' height='75' />"; } else { ?><img src="images/image.png" alt="" /><?php } ?></div>
			    	<div class="i_b">
			    		<input type="file" name="img1" /><br /><br />
			    		<p>Recommended Dimensions: 571x239</p>
			    		<?php if($headerImage != '') { ?> <p class="deleteText"><a href="custom_pages.php?id=<?php echo $_GET['id']; ?>&delImg=1" style="padding-left:0px;">DELETE IMAGE</a></p> <?php } ?>
			    	</div>
			    </div>	
	        </div>
	      <div class="clear"></div>
	      </div>
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Meta Title :</label>
		    </div>
		    <div class="General_r">
		      <input type="text" name="metaTitle" value="<?php echo $metatitle; ?>" />
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Meta Keywords :</label>
		    </div>
		    <div class="General_r">
		      <textarea name="metaKeys"><?php echo $metakeywords; ?></textarea>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Meta Description :</label>
		    </div>
		    <div class="General_r">
		      <textarea name="metaDescr"><?php echo $metadescription; ?></textarea>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  
		  <div class="General">
		    <div class="butt"> <input type="image" src="images/b_save.png" alt="Save" style="cursor:pointer;" /> <!-- <a href="#" class="but_a"><img src="images/b_cancel.png" alt="" /></a> --> </div>
		    <div class="clear"></div>
		  </div>
		  <div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</form>
  

<?php require_once("footer.php"); ?>

