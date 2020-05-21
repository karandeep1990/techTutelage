<?php 
require_once 'database.php';
require_once("header.php");

	if (isset($_GET['message']))
	{
		$msg = $_GET['message'];
	}
	else
	{
		$msg = "";
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



<form id="form1" name="form1" method="post" action="ProcPass.php?action=change" >

<div class="container_r">
	<div class="heading_R">
	  <div class="heading_r_l"></div>
	  <div class="heading_r_c">
	    <h2>Change Password</h2>
	  </div>
	  <div class="heading_r_r"></div>
	</div>
	<div class="clear"></div>
	<?php if($msg != '' ) { echo '<p class="error" style="margin-top:10px;">'.$msg.'</p>'; } ?>
	
	<div class="General_2">
	
	 <div class="General">
	    <div class="banner_l">
	      <label>User Name :</label>
	    </div>
	    <div class="General_r">
	      <input type="text" name="txtUser" value="<?=$_SESSION['admin_user']?>" disabled /> 
	    </div>
	    <div class="clear"></div>
	 </div>
	 
	 <!-- <div class="General">
	    <div class="banner_l">
	      <input type="hidden" name="txtHid" id="txtHid" value="<?php echo $pass; ?>" />
	      <label>Old Password :</label>
	    </div>
	    <div class="General_r">
	      <input type="Password" name="txtOldPass" class="bc_input" onblur="return chkPassword(txtOldPass,txtHid,'Incorrect Password')"/>
	    </div>
	    <div class="clear"></div>
	 </div> -->

	  
	 <div class="General">
	    <div class="banner_l">
	      <label>New Password :</label>
	    </div>
	    <div class="General_r">
	      <input type="password" name="txtNewPass" id="txtNewPass" /> 
	    </div>
	    <div class="clear"></div>
	 </div>
	  
	 <div class="General">
	    <div class="banner_l">
	      <label>Confirm Password :</label>
	    </div>
	    <div class="General_r">
	      <input type="password" name="txtPass3" id="txtPass3" /> 
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
