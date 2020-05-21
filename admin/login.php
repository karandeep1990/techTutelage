<?php 
require_once("database.php");
require_once("config.php");
$_SESSION['admin_user'] = '';
unset($_SESSION['admin_user']);
if (isset($_GET['errormessage'])) {
	$msg = $_GET['errormessage'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Login</title>
<link href="css/syber.css" rel="stylesheet" type="text/css" />
</head>


<body>
<!-- Master Start -->
<div class="master">

  <div class="header">
    <div class="logo"><a href="../"><img src="images/logo.png" alt="" /></a></div>
    <div class="navigation">
      <ul>
        <li><a href="login.php" title="Login"><span>Login</span></a></li>
        <li><a href="../" title="Company"><span>Company</span></a></li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>

  <div class="con">
    <h1>Admin Login with your TECH Tutelage Account Details</h1>
    
		<form id="form1" name="form1" method="post" action="ProcPass.php?action=Login">
			<div class="con_input">
				<div class="inp">
					<?php
						if(isset($_SESSION['logedout']))
						{
						echo '<p class="error">'.$_SESSION['logedout'].'</p>';
						$_SESSION['logedout'] = '';
						unset($_SESSION['logedout']);
						}	
						else
						echo '<p class="error">'.$msg.'</p>'; 
					?>
			
					<label>User Name :</label>
					<input type="text" name="txtUser" value="<?php echo $_COOKIE['usercookie']; ?>"  />
					<label>Password :</label>
					<input type="Password" name="txtPass" value="<?php echo $_COOKIE['passcookie']; ?>"  />
					<div class="clear"></div>
			
					<div class="login">
						<div class="login_l"> <input type="image" src="images/lodin.png" style="width:auto; border:none; padding-top:10px;" /> </div>
						<div class="login_r">
							<input type="checkbox" name="remember" id="remember"/>
							<label>Remember Me</label>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</form>
      
      <div class="clear"></div>
      <div class="text">
        <p><a href="forgot_password.php">Forgot Password ?</a><br/>
        </p>
      </div>
      <div class="clear"></div>
    </div>
    
    
    <div class="text_2"> <img src="images/icon.png" alt="" />
      <p>if you are an admin of this site then please input the valid credentials to login to the dashboard of the site to<br/>
        manage content, otherwise <a href="mailto:info@techtutelage.org"> contact system administrator</a> for further information.</p>
      <div class="clear"></div>
    </div>
  </div>
  
<?php
require_once("footer.php"); 
?>
