<?php 
require_once 'database.php';
require_once("header.php");

	$msg = "";
	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
		$isValid = is_valid_email($email);
		if($isValid)
		{
			$updateEmail = mysql_query("UPDATE bc_admin SET email = '".$email."' WHERE id = '".$_SESSION['adminuser_id']."' ");		
			
			if($updateEmail)
				$msg = "Email Address Changed";
			else
				$msg = "Some Issue Occured";	
		}
		else
		{
			$msg = "Invalid Format";
		}
	}
	
	function is_valid_email($email) {
	  $result = TRUE;
	  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
		$result = FALSE;
	  }
	  return $result;
	}
	
	if (isset($_SESSION['admin_user']))
	{	
		$sql = "select * from bc_admin where id='". $_SESSION['adminuser_id'] ."'";
		$res = mysql_query($sql);
		if (mysql_num_rows($res) > 0)
		{
			$rows = mysql_fetch_assoc($res);
			$pass = $rows['password'];
		}
	}

?>



<form id="form1" name="form1" method="post" action="changeEmail.php" >

<div class="container_r">
	<div class="heading_R">
	  <div class="heading_r_l"></div>
	  <div class="heading_r_c">
	    <h2>Change Email Address</h2>
	  </div>
	  <div class="heading_r_r"></div>
	</div>
	<div class="clear"></div>
	<?php if($msg != '' ) { echo '<p class="error" style="margin-top:10px;">'.$msg.'</p>'; } ?>
	
	<div class="General_2">
	
	 <div class="General">
	    <div class="General_l">
	      <label>Email Address :</label>
	    </div>
	    <div class="General_r">
	      <input type="text" name="email" value="<?=$rows['email'];?>" /> 
	    </div>
	    <div class="clear"></div>
	 </div>
	 
	 <div class="General">
	    <div class="butt"> <input type="image" src="images/b_save.png" alt="Save" style="cursor:pointer;" /> </div>
	    <div class="clear"></div>
	</div>
	
	</div>		
</div>
<div class="clear"></div>

</form>
<?php
require_once("footer.php"); 
?>
