<?php require('header.php'); ?>

<?php
$msg='';
if(isset($_POST['name']))
{
	if($_SESSION['security_code'] == $_POST['security_code'])
	{
		$query = "insert into contacts(`name`, `email`, `subject`, `message`) values('".$_POST['name']."', '".$_POST['email']."', '".$_POST['subject']."', '".addslashes($_POST['message'])."')";
		$query = mysql_query($query);

		 if($query)
		 {
		 	$to = @mysql_result(mysql_query("SELECT email FROM bc_admin ORDER BY id asc LIMIT 0,1"),0);
		 	$text = sendMail($_POST['name'], $_POST['email'], 'Contact Us Form Details', $_POST['subject'], addslashes($_POST['message']), $to);
		 	if($text == 1)
		 	{
		 		$msg = '<div class="msg">* Mail has been sent successfully.</div>';
		 	}
		 }
	}
	else
	{		
	?>
		<script> alert("Invalid Captcha String"); </script>
	<?php
	}
}


$heading = 'Contact Us';
$heading2 = "";
$metaTitle = $heading;

$content = '<script type="text/javascript">
				$(document).ready(function() {
				// validate the comment form when it is submitted
				$("#contactform_js").validate();
				});
			</script>
			
			<style type="text/css">
				.General{margin:0px;}
			</style>
						
			'.$msg.'			
			<div class="contact">
			<p style="padding-bottom:10px;">For any inquiries or comments, please send us an email to <a href="mailto:info@techTutelage.org">info@techTutelage.org</a>.</p>
			
			<p style="font-weight:bold; font-style:normal;">Our mailing address is:</p>
				<p>	F-75 </p>
				<p> Sanskrit Apartments</p>
				<p> Opp. North Ex Mall </p>
				<p> Sector-14, Rohini </p>
				<p> New Delhi, IN - 110085 </p>
			</div>
			
			<form id="contactform_js" method="post" action="">
			<div class="General_2">
								
				<div class="General">
					<div class="General_l">
						<label>Your Name:</label>
					</div>
					<div class="General_r">
						<input type="text" class="required" id="name" name="name" value="" gtbfieldid="13">
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="General">
					<div class="General_l">
						<label>Email address:</label>
					</div>
					<div class="General_r">
						<input type="text" class="required email" id="email" name="email" value="" gtbfieldid="14">
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="General">
					<div class="General_l">
						<label style="background:URl(none);">Message subject:</label>
					</div>
					<div class="General_r">					
						<input type="text" id="subject" name="subject" value="" gtbfieldid="15">
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="General">
					<div class="General_l">
						<label>Message:</label>
					</div>
					<div class="General_r">
						<textarea class="required" id="message" name="message" rows="2" cols="2"></textarea>
					</div>
					<div class="clear"></div>
				</div>

				<div class="General">
					<div class="General_l">
						<label style="background:URl(none);"></label>
					</div>
					<div class="General_r">
						<img src="captchasecurityimages.php?width=100&amp;height=40&amp;characters=5">
					</div>
					<div class="clear"></div>
				</div>

				<div class="General">
					<div class="General_l">
						<label>Captcha:</label>
					</div>
					<div class="General_r">
						<input type="text" class="required" name="security_code" id="security_code" gtbfieldid="16">
					</div>
					<div class="clear"></div>
				</div>

				<div style="clear:both;height:10px;"></div>
				<div class="General" style="text-align:center; padding-left:90px;">
					<input type="submit" value="" class="contact_submit_btn" name="submit">
					<input type="reset" value="" class="contact_reset_btn">	
					<div class="clear"></div>				
				</div>
				
			</div>
			</form>
			<div style="clear:both;height:10px;"></div>';
?>
<?php require('footer.php'); ?>
