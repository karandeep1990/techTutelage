<?php
require_once("database.php");
$current_url = $_SERVER['SCRIPT_FILENAME'];
$serverPath = str_replace("/admin/news.php","",$current_url);

if(isset($_GET['del'])) {
	$id = $_GET['id'];
	mysql_query("UPDATE posts SET fileName = '' WHERE id = '".$id."' ");
}

$action = '';
if( isset($_POST['newsDesc']) && isset($_POST['newsTitle']) ) {
	if(isset($_SESSION['msg'])) {
		unset($_SESSION['msg']);//Added by Karandeep for enable editing
	}
	$newsTitle	= DBin($_POST['newsTitle']);
	$shortdescr = DBin($_POST['shortdescr']);
	$newsDesc 	= DBin($_POST['newsDesc']);
	$href 		= getRewriteString($newsTitle);
	$cp_mt 	    = DBin($_POST['metatitle']);
	$cp_mk 	    = DBin($_POST['metakeywords']);
	$cp_md 	    = DBin($_POST['metadescription']);
    $pubDate    = dated($_POST['pubDate'], 'Y-m-d');
	
	$pdfName = '';
	if(isset($_FILES['pdf']) && ($_FILES['pdf']['name'] != '')) {
			$uploadDir = $serverPath."/images/uploads/pdf/";
			$pdf = $_FILES['pdf']['name'];
			$uploadfile = $uploadDir . $pdf;
			$moveFile = move_uploaded_file($_FILES['pdf']['tmp_name'], $uploadfile);
			if($moveFile)
			{
				$pdfName = $pdf;
			}
	}
	else if( isset($_POST['upd_id']) && ( (int)$_POST['upd_id'] != 0 ) ) {
		$pdfName = @mysql_result(mysql_query("SELECT fileName FROM posts WHERE id = '".$_POST['upd_id']."' "),0);
	}
	
	
	if( isset($_POST['upd_id']) && ( (int)$_POST['upd_id'] != 0 ) ) {
		$upd_id = (int)$_POST['upd_id'];
		$fieldNames  = array('title','href','shortdescr','descr','recType','fileName','metatitle','metakeywords','metadescription','publish_date');
		$fieldValues = array($newsTitle,$href,$shortdescr,$newsDesc,'news',$pdfName,$cp_mt,$cp_mk,$cp_md,$pubDate);
		$Sql = BuildSQL("posts", "update", $fieldNames, $fieldValues, "id='$upd_id' limit 1");
        $New = 0;
	}
	else {
		$fieldNames  = array('title','href','shortdescr','descr','dated','recType','fileName','metatitle','metakeywords','metadescription','publish_date');
		$fieldValues = array($newsTitle,$href,$shortdescr,$newsDesc,date('Y-m-d H:i'),'news',$pdfName,$cp_mt,$cp_mk,$cp_md,$pubDate);
		$Sql = BuildSQL("posts", "insert", $fieldNames, $fieldValues, "");
        $New = 1;
	}
	
	$res = mysql_query($Sql) or die(mysql_error());
	if($res) {
	   $_SESSION['msg'] = 'News saved successfully...';
       if( $New == 1 ) {
    	   //header("Location: list.php?link=5&msg=News saved successfully");
    	   $_SESSION['msg'] = 'News added successfully...';
    	   header("Location: news.php");
           ob_flush();
           exit;
        }
    }
}
require_once("header.php");

if( isset($_GET['id']) ) {
	if(isset($_SESSION['msg'])) {
		unset($_SESSION['msg']);//Added by Karandeep for enable editing
	}
	$id = (int)$_GET['id'];
	$Sql = mysql_query("select * from posts where id='$id' limit 1") or die(mysql_query());
	$Res = mysql_fetch_assoc($Sql);
	
	$newsTitle  = DBout($Res['title']);
	$descr 	    = DBout($Res['descr']);
	$shortdescr = DBout($Res['shortdescr']);
	$pdfName  	= DBout($Res['fileName']);
	$cp_mt 		= DBout($Res['metatitle']);
	$cp_mk 		= DBout($Res['metakeywords']);
	$cp_md 		= DBout($Res['metadescription']);
    $pubDate    = dated($Res['publish_date'], 'm/d/Y');
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

<form method="post" name="bc_form" enctype="multipart/form-data" action="">
<?php echo $action; ?>

	<div class="container_r">
		<div class="heading_R">
		  <div class="heading_r_l"></div>
		  <div class="heading_r_c">
		    <h2>Create / Edit News</h2>
		  </div>
		  <div class="heading_r_r"></div>
		</div>
		<div class="clear"></div>
		<?php if( isset($_SESSION['msg']) ) { echo '<p class="error" style="margin-top:10px;">'.$_SESSION['msg'].'</p>'; session_unregister('msg'); } ?>
		
		<div class="General_2">
		  
		  <!-- <div class="General">
		    <div class="General_l">
		      <label>Published Date: (mm/dd/yy)</label>
		    </div>
		    <div class="General_r">
		      <input type="text" name="pubDate" id="datepicker" value="<?php echo $pubDate; ?>" /> 
		    </div>
		    <div class="clear"></div>
		  </div> -->
		  
		  <div class="General">
		    <div class="General_l">
		      <label>News Title :</label>
		    </div>
		    <div class="General_r">
		      <input type="text" name="newsTitle" value="<?php echo $newsTitle; ?>" /> 
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  
		  <div class="General">
		    <div class="General_l">
		      <label>Short Description :</label>
		    </div>
		    <div class="General_r">
		      <textarea name="shortdescr" style="height:60px;" /><?php echo $shortdescr; ?></textarea> 
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		 
		  <div class="General">
		    <div class="General_l">
		      <label>Full Description :</label>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General">
		    <div class="General_r" style="width:460px;">
		      <textarea name="newsDesc" id="descr"><?php echo $descr; ?></textarea>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Upload File :</label>
		    </div>
		    <div class="General_r">
		      <table border="0">
		      	<tr>
		      		<input type="file" name="pdf" /> <br />
		      		<?php if($pdfName != '') { echo $pdfName; echo '<span class="deleteText"><a href="news.php?id='.$id.'&del=1">DELETE</a></span>'; } ?> 
		      	</tr>
		      </table>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Meta Title :</label>
		    </div>
		    <div class="General_r">
		      <input type="text" name="metatitle" value="<?php echo $cp_mt; ?>" />
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Meta Keywords :</label>
		    </div>
		    <div class="General_r">
		      <textarea name="metakeywords" style="height:60px;"><?php echo $cp_mk; ?></textarea>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Meta Description :</label>
		    </div>
		    <div class="General_r">
		      <textarea name="metadescription" style="height:60px;"><?php echo $cp_md; ?></textarea>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  
		  <div class="General">
		    <div class="butt"> <input type="image" src="images/b_save.png" alt="Save" style="cursor:pointer;" /> </div>
		    <div class="clear"></div>
		  </div>
		  <div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</form>	


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
<?php require_once("footer.php"); ?>
