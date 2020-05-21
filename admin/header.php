<?php
session_start();
if ( $_SESSION['admin_user'] == '' || $_SESSION['user_type'] == '')
{
	header('Location: login.php');
	exit;
}

require_once("database.php"); 
require_once("config.php");

$adminInfoObj = mysql_query("SELECT * FROM bc_admin WHERE id = '".$_SESSION['adminuser_id']."' ");
$adminInfo = mysql_fetch_array($adminInfoObj);

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Admin Control Panel ::</title>
<link href="css/syber.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="jqtransformplugin/jqtransform.css" type="text/css" media="all" />
<link rel="stylesheet" href="demo.css" type="text/css" media="all" />
<script type="text/javascript" src="requiered/jquery.js" ></script>
<script type="text/javascript" src="jqtransformplugin/jquery.jqtransform.js" ></script>

<?php $curPage = curPageName(); ?>

<?php if($curPage == 'list.php') { ?>
	<script language="javascript" type="text/javascript">
	$(function(){
		$('form').jqTransform({imgPath:'jqtransformplugin/img/'});
	});
	</script>
<?php } ?>

</head>

<body>

<!-- ------ Header Section ----->
<div class="master">
  <div class="header">
    <div class="logo"><a href="../"><img src="images/logo.png" alt="" /></a></div>
    <div class="navigation">
      <ul>
      	<li><a href="../" title="Company"><span>Company</span></a></li>
        <li><a href="ProcPass.php?action=logout" title="Login"><span>Logout</span></a></li>        
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<div class="clear"></div>


<div class="top_nav">
  <div class="m_top_nav">
    <div class="m_top_nav_l">
      <h1>Welcome to the <span>TECH Tutelage</span> System</h1>
    </div>
    <div class="m_top_nav_r">
      <ul>
        <li><?php echo $adminInfo['email']; ?></li>
        <li><span>|</span></li>
        <li><?php echo ucfirst($adminInfo['name']); ?></li>
        <li><span>|</span></li>
        <!-- <li><a href="#" >Help</a> </li>
        <li><span>|</span></li> -->
        <li><a href="ProcPass.php?action=logout"class="help">Sign Out</a> </li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<div class="clear"></div>
<!-- ------ Header Section ----->


<div class="container">
<!-- ------ Left Section ----->
  <div class="container_l">
    <div class="heading">
      <div class="heading_l"></div>
      <div class="heading_c">
        <h2>Website Sections</h2>
      </div>
      <div class="heading_r"></div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
     <?php require_once("menu.php"); ?>    
  </div>
<!-- ------ Left Section ----->
