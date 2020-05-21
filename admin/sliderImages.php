<?php
require_once("database.php");
include("../resize-class.php");

$id = '';
$name = '';
$linkImg = '';
	
if(isset($_GET['id']) && ($_GET['id'] != ''))
{
	$id = (int)$_GET['id'];
	$getImageInfo_obj = mysql_query("SELECT * FROM sliderImages WHERE id = '$id' "); 
	$getImageInfo = mysql_fetch_array($getImageInfo_obj);
	$id = $getImageInfo['id'];
	$name = $getImageInfo['name'];
	$linkImg = $getImageInfo['linkImg'];
}


if(isset($_GET['id']) && ($_GET['id'] != ''))
{
	if(isset($_POST['link1']))
	{
		$link = $_POST['link1'];
		$Sql = "update sliderImages set linkImg = '$link' WHERE id = '".$_GET['id']."' ";
		$res = mysql_query($Sql) or die(mysql_error());
	}
	
	if(isset($_FILES['img1']) && ($_FILES['img1'] != ''))
	{
		  $Image = "";
		  if( !empty( $_FILES['img1']['name'] ) ) {
			//$uploadDir = IMAGES_PATH.'pages/';
			$uploadDir = "/home/checkpet/public_html/ecolocap/images/uploads/";
			$Image = time().$_FILES['img1']['name'];
			$uploadfile = $uploadDir . time().basename($_FILES['img1']['name']);
			move_uploaded_file($_FILES['img1']['tmp_name'], $uploadfile);

			$resizeObj = new resize($uploadfile);
			$resizeObj -> resizeImage(146, 126, 'exact');
			$resizeObj -> saveImage($uploadfile, 100);

			@unlink($uploadDir.$name);
			
			$created = date("Y-m-d");

			$link = $_POST['link1'];
			$link = addslashes($link);
			//$Sql = "insert into sliderImages (name, linkImg, created) values ('$Image', '$link', '$created')";
			$Sql = "update sliderImages set name = '$Image' WHERE id = '".$_GET['id']."' ";
		  }

	 	 $res = mysql_query($Sql) or die(mysql_error());
	}
	
	if($res) {
		$_SESSION['msg'] = '<div class="success">Image Updated successfully...</div>';
		header("Location: sliderImages.php?id=".$_GET['id']);
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
				$uploadDir = "/home/checkpet/public_html/ecolocap/images/uploads/";
				$Image = time().$_FILES['img'.$i]['name'];
				$uploadfile = $uploadDir . time().basename($_FILES['img'.$i]['name']);
				move_uploaded_file($_FILES['img'.$i]['tmp_name'], $uploadfile);
		
				$resizeObj = new resize($uploadfile);
				$resizeObj -> resizeImage(146, 126, 'exact');
				$resizeObj -> saveImage($uploadfile, 100);
				
				$created = date("Y-m-d");
		
				$link = $_POST['link'.$i];
				$link = addslashes($link);
				$Sql = "insert into sliderImages (name, linkImg, created) values ('$Image', '$link', '$created')";
			  }

			  $res = mysql_query($Sql) or die(mysql_error());	  			  
			}
		}
	}
	
	if($res) {
		$_SESSION['msg'] = '<div class="success">Image added successfully...</div>';
		header("Location: sliderImages.php");
		exit;
	}
}



require_once("header.php");
if( isset($_SESSION['msg']) ) {
  echo $_SESSION['msg'];
  session_unregister('msg');
}

?>


<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

  <tr><td colspan="2" align="right" class="bc_heading">Add Slider Images</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>

  <form method="post" name="bc_form" enctype="multipart/form-data" action="">
    <input type="hidden" name="action" value="<?php echo $action; ?>" />

    <tr>
      <td class="bc_input_td" align="right"><strong>Upload Image:</strong><br /><em>Best Width:146px, Height:126px</em></td>
      <td class="bc_input_td">
      	<table border="0">
      		<tr>
      			<td><input type="file" name="img1" style="width:300px;" /></td>
      			<td><?php if($name != '') { echo "<img src='../images/uploads/$name' border=0 height='60' />"; } ?> </td>
      		</tr>
      	</table>
      </td>     
    </tr>
    <tr>
      <td class="bc_input_td" align="right"><strong>Link Url:</strong></td>
      <td class="bc_input_td"><input type="text" name="link1" value="<?php echo $linkImg; ?>" style="width:300px;" /></td>
    </tr>

    
    <tr><td colspan="2" align="center" style="height:50px;">&nbsp;</td></tr>
    <tr><td colspan="2" align="center"><input name="submit" type="submit" value="Upload Image" class="bc_button" /></td></tr>
  </form>

</table>

<?php require_once("footer.php"); ?>

