<?php
ini_set('display_errors',1);
require_once("includes/common_includes.php");


/*********** Get Current Page Name **************/
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
$curPage = curPageName();
/*********** Get Current Page Name **************/

$content_page = 'content.tpl.html';  
$templates=array(
        'header'  =>  'header.tpl.html',
        'content'  =>  $content_page,
        'main'  =>  'main.tpl.html',
        'sidebar'  =>  'sidebar.tpl.html',
        'footer'  =>  'footer.tpl.html'
);


$db = new Database();
$db->connect();
$tpl=new_tpl();
$tpl->define($templates);



/************** Top Navigation Code *************/
include('headerNav.php');
$tpl->assign('TOPNAVLI',$navTopVariable);
/************** Top Navigation Code *************/


/************** Bottom Navigation Code *************/
include('bottomNav.php');
$tpl->assign('BOTTOM_FOOTER',$bottomTopVariable);
/************** Bottom Navigation Code *************/



/************** Top Banner Code *************/
$query = "select * from banners ORDER BY imageListingID";
$bannersObj = mysql_query($query);

$banner = '<div class="bannerback"> <div id="banner"> <div id="slider" class="nivoSlider">';
while($banners = mysql_fetch_array($bannersObj))
{
	$banner .= '<a href="'.$banners['linkImg'].'"><img src="images/uploads/'.$banners['name'].'" alt="" width="926" height="283" border="0" /></a>';
}
$banner .= '</div></div></div>';

$tpl->assign('BANNER',$banner);
/************** Top Banner Code *************/


/************** Left Side News & Events Code *************/
$newsNevents = '';
$latestNewsEventsObj = mysql_query("SELECT * FROM posts WHERE ((recType = 'news' || recType = 'events') && shortdescr != '') ORDER BY id desc limit 0,3");

if(mysql_num_rows($latestNewsEventsObj) > 0)
{
	$newsNevents .= '<h2>News &amp; Events</h2>
		      	     <h3>Know about our latest happenings</h3>
		      	     <ul>';
		      	
	while($latestNewsEvents = mysql_fetch_array($latestNewsEventsObj))
	{
		$postId = $latestNewsEvents['id'];
		$postTitle = $latestNewsEvents['title'];
		$postShortDesc = $latestNewsEvents['shortdescr'];
	
		$newsNevents .= '<li>'.substr($postShortDesc,0,100).' <a href="post.php?id='.$postId.'">Read more</a></li>';
		        
	}
	
	$newsNevents .= '</ul>';
}
$tpl->assign('NEWSEVENTS',$newsNevents);
/************** Left Side News & Events Code *************/


/************** Left Side Blogs Code *************/
$blogs = '';
$latestBlogsObj = mysql_query("SELECT * FROM posts WHERE (recType = 'blogs' && shortdescr != '') ORDER BY id desc limit 0,3");

if(mysql_num_rows($latestBlogsObj) > 0)
{
	$blogs .= '<h2>Latest Blog</h2>
		       <h3>Get in touch and have your say</h3>
		       <ul>';
		      	
	while($latestBlogs = mysql_fetch_array($latestBlogsObj))
	{
		$postId = $latestBlogs['id'];
		$postTitle = $latestBlogs['title'];
		$postShortDesc = $latestBlogs['shortdescr'];
	
		$blogs .= '<li>'.substr($postShortDesc,0,100).' <a href="post.php?id='.$postId.'">Read more</a></li>';
		        
	}
	
	$blogs .= '</ul>';
}
$tpl->assign('BLOGS',$blogs);
/************** Left Side Blogs Code *************/


/**************** Content + SEO details *******************/
if($curPage == 'contact.php') {
	include('contact.php');
} else {
	include('content.php');
}
/**************** Content + SEO details *******************/




$tpl->parse("HEADER","header");
$tpl->parse("SIDEBAR","sidebar");
$tpl->parse("FOOTER","footer");
$tpl->parse("CONTENT","content");
$tpl->parse("MAIN","main");

$tpl->FastPrint();
?>
