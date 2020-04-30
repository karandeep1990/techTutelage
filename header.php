<?php

ini_set('display_errors',1);
require_once("includes/common_includes.php");
session_start();

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


$headerImage = '';

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


/************** Header Navigation *****************/
$headerLinks = "<ul id='cssdropdown'>
					<li class='mainitems'><a href='index.php'>home</a></li>
					<li class='mainitems'><a>Services</a>
					  <ul class='subuls'>
						<li class='BB'><img src='images/nav_li_T.png' alt='' /></li>
						<li><a href='".callPageHref('18')."' title='Knowledge Management'>Knowledge Management</a></li>
						<li><a href='".callPageHref('19')."' title='Industry Practices'>Industry Practices</a></li>
						<li><a href='".callPageHref('12')."' title='ERP Solutions'>ERP Solutions</a></li>
						<li><a href='".callPageHref('20')."' title='AWS'>AWS</a></li>
						<li><a href='".callPageHref('21')."' title='BPMN-DMN-CMMN'>Business Workflows</a></li>
						<li><a href='".callPageHref('14')."' title='Data Analytics' class='last'>Data Analytics</a></li>
						<li class='BB'><img src='images/nav_li_B.png' alt='' /></li>
					  </ul>
					</li>
					<li class='mainitems'><a href='post.php?href=coming-soon'>Learning & development</a></li>
					<li><span><a href='contact.php'><img src='images/ContactNow.png' alt='contact us' width='248' height='54' border='0' /></a></span></li>
					<li class='mainitems'><a href='".callPageHref('8')."'>Mentorship</a>
					  <ul class='subuls'>
						<li class='BB'><img src='images/nav_li_T.png' alt='' /></li>
						<li><a href='post.php?type=news' title='Our Team'>Our Team</a></li>
						<li><a href='post.php?type=announcements' title='Announcements'>External Stakeholders</a></li>
						<li><a href='post.php?type=events' title='Events'>Events</a></li>
						<li><a href='#' title='Network' class='last'>Network</a></li>
						<li class='BB'><img src='images/nav_li_B.png' alt='' /></li>
					  </ul>
					</li>

					<li class='mainitems'><a href='".callPageHref('9')."'>member's area</a>
					  <ul class='subuls'>
						<li class='BB'><img src='images/nav_li_T.png' alt='' /></li>
						<li><a href='membersArea.php?type=archives' title='Archives'>Archives</a></li>
						<li><a href='membersArea.php?type=grievances' title='Grievances'>Grievances</a></li>
						<li><a href='membersArea.php?type=legislativematters' title='Legislative Matters'>Legislative Matters</a></li>
						<li><a href='membersArea.php?type=hottopics' title='Hot Topics' class='last'>Hot Topics</a></li>
						<li class='BB'><img src='images/nav_li_B.png' alt='' /></li>
					  </ul>
					</li>
				</ul>
";
$tpl->assign('HEADERLINKS',$headerLinks);		        
/************** Header Navigation *****************/


		        
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
		$postHref = $latestNewsEvents['href'];
	
		$newsNevents .= '<li>'.substr($postShortDesc,0,100).' <a href="post.php?href='.$postHref.'">Read more</a></li>';
		        
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
		$postHref = $latestBlogs['href'];
	
		$blogs .= '<li>'.substr($postShortDesc,0,100).' <a href="post.php?href='.$postHref.'">Read more</a></li>';
		        
	}
	
	$blogs .= '</ul>';
}
$tpl->assign('BLOGS',$blogs);
/************** Left Side Blogs Code *************/

$metaTitle = ':: Welcome to TECH Tutelage  :: Technology Tutelage :: Mentorship :: Professional Chain';
$metaKeywords = 'Technology Tutelage :: Mentorship :: Professional Chain';
$metaDescription = 'Technology Tutelage :: Mentorship :: Professional Chain';
?>
