<?php
require_once("database.php");

if(isset($_POST['catTitle']))
{
	if(isset($_GET['id']) && ($_GET['id'] != ''))
	{
		if(isset($_SESSION['msg'])) {
			unset($_SESSION['msg']);//Added by Karandeep for enable editing
		}
		$catTitle = $_POST['catTitle'];
		
		$alreadyExists = mysql_query("SELECT * FROM membersAreaCategories WHERE catTitle = '$catTitle' AND id!='".$_GET['id']."' ");
		if(mysql_num_rows($alreadyExists) > 0) {
			$_SESSION['msg'] = 'Category already exists...';
			header("Location: membersAreaCategories.php?id=".$_GET['id']);
			exit;
		} else {
			$Sql = "update membersAreaCategories SET catTitle = '$catTitle' WHERE id = '".$_GET['id']."' ";
			$res = mysql_query($Sql) or die(mysql_error());	  	
	
			if($res) {
				$_SESSION['msg'] = 'Category Updated successfully...';
				header("Location: membersAreaCategories.php?id=".$_GET['id']);
				exit;
			}
		}
	}
	else
	{
		$catTitle = $_POST['catTitle'];
		$dated = date("Y-m-d");

		$alreadyExists = mysql_query("SELECT * FROM membersAreaCategories WHERE catTitle = '$catTitle'");
		if(mysql_num_rows($alreadyExists) > 0) {
			$_SESSION['msg'] = 'Category already exists...';
			header("Location: membersAreaCategories.php");
			exit;
		} else {
			$Sql = "insert into membersAreaCategories (catTitle, dated) values ('$catTitle', '$dated')";
			$res = mysql_query($Sql) or die(mysql_error());
	
			if($res) {
				$_SESSION['msg'] = 'Category added successfully...';
				header("Location: membersAreaCategories.php");
				exit;
			}
		}
	}
}

if(isset($_GET['id']) && ($_GET['id'] != ''))
{
	if(isset($_SESSION['msg'])) {
		unset($_SESSION['msg']);//Added by Karandeep for enable editing
	}
	$Sql = "SELECT * FROM membersAreaCategories WHERE id = '".$_GET['id']."' ";
	$dataObj= mysql_query($Sql);
	$data = mysql_fetch_array($dataObj);
	$catTitle = $data['catTitle'];
}

require_once("header.php");
?>

<form method="post" name="bc_form" enctype="multipart/form-data" action="">

	<div class="container_r">
		<div class="heading_R">
		  <div class="heading_r_l"></div>
		  <div class="heading_r_c">
		    <h2>Add/Edit Category</h2>
		  </div>
		  <div class="heading_r_r"></div>
		</div>
		<div class="clear"></div>
		<?php if( isset($_SESSION['msg']) ) { echo '<p class="error" style="margin-top:10px;">'.$_SESSION['msg'].'</p>'; session_unregister('msg'); } ?>
		
		<div class="General_2">
		  
		  <div class="General">
		    <div class="banner_l">
		      <label>Category Title :</label>
		    </div>
		    <div class="banner_r">
		      <input type="text" name="catTitle" value="<?php echo $catTitle; ?>" />
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

<?php require_once("footer.php"); ?>

