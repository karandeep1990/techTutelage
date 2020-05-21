<?php
require_once("database.php");

$recType = $_GET['recType'];

$showCats = '0';
if($recType == 'grievances') {
	if(isset($_SESSION['msg'])) {
		unset($_SESSION['msg']);//Added by Karandeep for enable editing
	}
	$showCats = '1';
	$catListQuery = "SELECT * FROM membersAreaCategories ORDER BY catTitle ASC";
	$catListObj = mysql_query($catListQuery);
}

$recType1 = $recType;	
if($recType1 == 'hot') { 
	$recType1 = 'Hot Topic'; 
} else if($recType1 == 'legislative') { 
	$recType1 = 'Legislative Matters'; 
}

$current_url = $_SERVER['SCRIPT_FILENAME'];
$serverPath = str_replace("/admin/membersArea.php","",$current_url);

if(isset($_GET['del'])) {
	$id = $_GET['id'];
	mysql_query("UPDATE membersArea SET fileName = '' WHERE id = '".$id."' ");
}

$action = '';
if( isset($_POST['title']) ) {
	if(isset($_SESSION['msg'])) {
		unset($_SESSION['msg']);//Added by Karandeep for enable editing
	}
	$title	= DBin($_POST['title']);
	$linkUrl	= DBin($_POST['linkUrl']);
	$href 		= getRewriteString($title);
	$catId 		= DBin($_POST['catId']);
	$cp_mt 	    = DBin($_POST['metatitle']);
	$cp_mk 	    = DBin($_POST['metakeywords']);
	$cp_md 	    = DBin($_POST['metadescription']);
 	
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
		$pdfName = @mysql_result(mysql_query("SELECT fileName FROM membersArea WHERE id = '".$_POST['upd_id']."' "),0);
	}
	
	
	if( isset($_POST['upd_id']) && ( (int)$_POST['upd_id'] != 0 ) ) {
		$upd_id = (int)$_POST['upd_id'];
		$fieldNames  = array('title','linkUrl','href','catId','recType','fileName','metatitle','metakeywords','metadescription');
		$fieldValues = array($title,$linkUrl,$href,$catId,$recType,$pdfName,$cp_mt,$cp_mk,$cp_md);
		$Sql = BuildSQL("membersArea", "update", $fieldNames, $fieldValues, "id='$upd_id' limit 1");
        $New = 0;
	}
	else {
		$fieldNames  = array('title','linkUrl','href','catId','dated','recType','fileName','metatitle','metakeywords','metadescription');
		$fieldValues = array($title,$linkUrl,$href,$catId,date('Y-m-d H:i'),$recType,$pdfName,$cp_mt,$cp_mk,$cp_md);
		$Sql = BuildSQL("membersArea", "insert", $fieldNames, $fieldValues, "");
        $New = 1;
	}
	
	$res = mysql_query($Sql) or die(mysql_error());
	if($res) {
	   $_SESSION['msg'] = ucfirst($recType1)." saved successfully...";
       if( $New == 1 ) {
    	   $_SESSION['msg'] = ucfirst($recType1)." added successfully...";
    	   header("Location: membersArea.php?recType=$recType");
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
	$Sql = mysql_query("select * from membersArea where id='$id' limit 1") or die(mysql_query());
	$Res = mysql_fetch_assoc($Sql);
	
	$title  = DBout($Res['title']);
	$catId  = DBout($Res['catId']);
	$linkUrl  = DBout($Res['linkUrl']);
	$pdfName  	= DBout($Res['fileName']);
	$cp_mt 		= DBout($Res['metatitle']);
	$cp_mk 		= DBout($Res['metakeywords']);
	$cp_md 		= DBout($Res['metadescription']);
    $action = '<input type="hidden" name="upd_id" value="'.$id.'" />';
}
?>

<form method="post" name="bc_form" enctype="multipart/form-data" action="">
<?php echo $action; ?>

	<div class="container_r">
		<div class="heading_R">
		  <div class="heading_r_l"></div>
		  <div class="heading_r_c">
		    <h2>Create / Edit <?php echo ucfirst($recType1); ?></h2>
		  </div>
		  <div class="heading_r_r"></div>
		</div>
		<div class="clear"></div>
		<?php if( isset($_SESSION['msg']) ) { echo '<p class="error" style="margin-top:10px;">'.$_SESSION['msg'].'</p>'; session_unregister('msg'); } ?>
		
		<div class="General_2">
		  
		  <div class="General">
		    <div class="General_l">
		      <label> Title :</label>
		    </div>
		    <div class="General_r">
		      <input type="text" name="title" value="<?php echo $title; ?>" /> 
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
		      		<?php if($pdfName != '') { echo $pdfName; echo '<span class="deleteText"><a href="membersArea.php?recType='.$recType.'&id='.$id.'&del=1">DELETE</a></span>'; } ?> 
		      	</tr>
		      </table>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <div class="General" style="text-align:center; margin-top:10px; font-weight:bold; font-style:italic;">OR</div>
		  
		  <div class="General">
		    <div class="General_l">
		      <label>Url :</label>
		    </div>
		    <div class="General_r">
		      <input type="text" name="linkUrl" value="<?php echo $linkUrl; ?>" /> 
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		  <?php if($showCats == '1') { ?>
			<div class="General">
				<div class="General_l">
					<label>Select Category :</label>
				</div>
				<div class="General_r">
					<?php
						$select = '';
						if(mysql_num_rows($catListObj) > 0) {
							$select .= '<select name="catId">';
							$select .= '<option value="">Select Category</option>';
							while($catList = mysql_fetch_array($catListObj)) {
								if($catId == $catList['id']) {
									$selected = " selected=selected";
								} else {
									$selected = '';
								}
								$select .= '<option '.$selected.' value="'.$catList['id'].'" >'.$catList['catTitle'].'</option>';
							}
							$select .= '</select>';
						}
						echo $select;
					?>
				</div>
				<div class="clear"></div>
			</div>
		  <?php } ?>
		  
		  
		  <!-- <div class="General">
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
		  </div> -->
		  
		  
		  <div class="General">
		    <div class="butt"> <input type="image" src="images/b_save.png" alt="Save" style="cursor:pointer;" /> </div>
		    <div class="clear"></div>
		  </div>
		  <div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</form>	

<?php require_once("footer.php"); ?>
