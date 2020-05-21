<?php
require_once("database.php");
include("../resize-class.php");

$current_url = $_SERVER['SCRIPT_FILENAME'];
$serverPath = str_replace("/admin/banners.php","",$current_url);
			
$id = '';
$name = '';
$linkImg = '';
$title = '';
	
if(isset($_GET['id']) && ($_GET['id'] != ''))
{
	$id = (int)$_GET['id'];
	$getImageInfo_obj = mysql_query("SELECT * FROM banners WHERE id = '$id' "); 
	$getImageInfo = mysql_fetch_array($getImageInfo_obj);
	$id = $getImageInfo['id'];
	$name = $getImageInfo['name'];
	$linkImg = $getImageInfo['linkImg'];
	$title = $getImageInfo['title'];
}


if(isset($_GET['id']) && ($_GET['id'] != ''))
{
	if(isset($_POST['link1']))
	{
		$link = $_POST['link1'];
		$title = $_POST['title'];
		
		$Sql = "update banners set linkImg = '$link', title = '$title' WHERE id = '".$_GET['id']."' ";
		$res = mysql_query($Sql) or die(mysql_error());
	}
	
	if(isset($_FILES['img1']) && ($_FILES['img1'] != ''))
	{
		  $Image = "";
		  if( !empty( $_FILES['img1']['name'] ) ) {
			//$uploadDir = IMAGES_PATH.'pages/';			
			
			$uploadDir = $serverPath."/images/uploads/";
			$Image = time().$_FILES['img1']['name'];
			$uploadfile = $uploadDir . time().basename($_FILES['img1']['name']);
			move_uploaded_file($_FILES['img1']['tmp_name'], $uploadfile);

			$resizeObj = new resize($uploadfile);
			$resizeObj -> resizeImage(926, 283, 'exact');
			$resizeObj -> saveImage($uploadfile, 100);

			@unlink($uploadDir.$name);
			
			$created = date("Y-m-d");

			$Sql = "update banners set name = '$Image' WHERE id = '".$_GET['id']."' ";
		  }

	 	 $res = mysql_query($Sql) or die(mysql_error());
	}
	
	if($res) {
		$_SESSION['msg'] = 'Banner Updated successfully...';
		header("Location: banners.php?id=".$_GET['id']);
		exit;
	}
	
}
else
{
	if(isset($_FILES['img1']) || isset($_FILES['img2']) || isset($_FILES['img3']))
	{
		for($i=1; $i<=3; $i++)
		{
			if(isset($_FILES['img'.$i]) && $_FILES['img'.$i]['name'] != '') {
	
			  $Image = "";
			  if( !empty( $_FILES['img'.$i]['name'] ) ) {
				//$uploadDir = IMAGES_PATH.'pages/';
				$uploadDir = $serverPath."/images/uploads/";
				$Image = time().$_FILES['img'.$i]['name'];
				$uploadfile = $uploadDir . time().basename($_FILES['img'.$i]['name']);
				move_uploaded_file($_FILES['img'.$i]['tmp_name'], $uploadfile);
		
				$resizeObj = new resize($uploadfile);
				$resizeObj -> resizeImage(926, 283, 'exact');
				$resizeObj -> saveImage($uploadfile, 100);
				
				$created = date("Y-m-d");
		
				$link = $_POST['link'.$i];
				$title = $_POST['title'];
				
				$link = addslashes($link);
				$Sql = "insert into banners (title, name, linkImg, created) values ('$title', '$Image', '$link', '$created')";
			  }

			  $res = mysql_query($Sql) or die(mysql_error());	  			  
			}
		}
	}
	
	if($res) {
		$_SESSION['msg'] = 'Banner added successfully...';
		header("Location: banners.php");
		exit;
	}
}



require_once("header.php");
?>

<form method="post" name="bc_form" enctype="multipart/form-data" action="">
<input type="hidden" name="action" value="<?php echo $action; ?>" />

	<div class="container_r">
		<div class="heading_R">
		  <div class="heading_r_l"></div>
		  <div class="heading_r_c">
		    <h2>Add/Edit Banner</h2>
		  </div>
		  <div class="heading_r_r"></div>
		</div>
		<div class="clear"></div>
		<?php if( isset($_SESSION['msg']) ) { echo '<p class="error" style="margin-top:10px;">'.$_SESSION['msg'].'</p>'; session_unregister('msg'); } ?>
		
		<div class="General_2">
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Banner Name :</label>
		    </div>
		    <div class="banner_r">
		      <input type="text" name="title" value="<?php echo $title; ?>" />
		      <p>Recommended Dimensions: 926x283</p>
		    </div>
		    <div class="clear"></div>
		  </div>
		  
		 
		  <div class="General">
		    <div class="banner_l">
		      	<label>Image :</label>
		    </div>
		    <div class="banner_r">
			    <div class="r_m">
			    	<div class="img"><?php if($name != '') { echo "<img src='../images/uploads/$name' border=0 width='86' height='75' />"; } else { ?><img src="images/image.png" alt="" /><?php } ?></div>
			    	<div class="i_b">
			    		<input type="file" name="img1" />
			    	</div>
			    </div>	
	        </div>
	      <div class="clear"></div>
		  </div>
		
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Url :</label>
		    </div>
		    <div class="General_r">
		      <input type="text" name="link1" value="<?php echo $linkImg; ?>" />
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

