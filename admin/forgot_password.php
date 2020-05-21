<?php 
require_once("database.php");
require_once("config.php");
require_once('mail/class.phpmailer.php');

if( isset($_POST['txtEmail']) && isset($_POST['txtCode']) ) {
	$txtEmail = DBin($_POST['txtEmail']);
	if( $_SESSION['captchaValue'] == md5($_POST['txtCode']) ) {
		
		$q = mysql_query("select email from bc_admin where email='$txtEmail' limit 1");
		if( mysql_num_rows($q) == 1 ) {
			
			$mkNewPass = rand(9999, 999999);
			mysql_query("update bc_admin set password='$mkNewPass' where email='$txtEmail' limit 1");
			
			$To 	 = $txtEmail;
			$From 	 = ADMIN_EMAIL;
			$Subject = 'Forgot Password';
			$Body 	 = 'Hi,';
			$Body	.= '<br /><br />Your new password is: '.$mkNewPass;
			$Body	.= '<br /><br />Please change your password after login. ';
			$Body	.= '<br /><br />Thank you.';
			
			sendMail($To, $From, $Subject, $Body);
			$msg = 'Password has been sent...';
		}
		else
			$msg = 'Email Address Not Found';
	}
	else
		$msg = 'Invalid Security Code';		
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
    <h1>Forgot Password</h1>
    
    	<div class="error"><?php echo $msg?></div>
		<form action="" method="post">
			<div class="con_input">
				<div class="inp">
					<label>Email Address :</label>
					<input type="text" name="txtEmail" value="" class="input" />
					<label>Security Code : <img src="captcha.php" /></label>
					<input type="text" name="txtCode" value="" class="input" />
					<div class="clear"></div>
			
					<div class="login">
						<div class="login_l"> <input type="image" src="images/submit.png" style="width:auto; border:none; padding-top:10px;" /> </div>						
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</form>
      
      <div class="clear"></div>
    </div>
    
    
    <div class="text_2"> <img src="images/icon.png" alt="" />
      <p>if you are an admin of this site then please input the valid credentials to login to the dashboard of the site to<br/>
        manage content, otherwise <a href="mailto:info@gos-ltd.com"> contact system administrator</a> for further information.</p>
      <div class="clear"></div>
    </div>
  </div>
  
<?php
require_once("footer.php"); 
?>
