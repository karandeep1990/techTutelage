<?php
/***********************************************************************/
$page_name = '';
$notFound = '1';

if($curPage == 'index.php' || $curPage == '') {
  	$page_name = 'index';
  	$notFound = '0';
}
else if($curPage == 'page.php' && isset($_GET['id']) && $_GET['id'] != '') {
	$currentPageId = $_GET['id'];
	$page_name = @mysql_result(mysql_query("SELECT seoname FROM custom_pages WHERE id = '".$currentPageId."' "),0);
  	$notFound = '0';
}
else if($curPage == 'post.php' && isset($_GET['id']) && $_GET['id'] != '') {
	$currentPostId = $_GET['id'];
  	$notFound = '0';	
}
else if($curPage == 'post.php') {
	$allPosts = '1';
	$notFound = '0';
}
else if($curPage == 'search.php') {
	$searchResults = '1';
	$notFound = '0';
}
else if($curPage == 'contact.php') {
	$contact = '1';
	$notFound = '0';
}

if($notFound == '1')
{
	$page_name = 'index'; //For Show Home Page When Not Found a Page
}

$metaTitle = ':: Welcome to Tech Tutelage ::';
$metaKeywords = '';
$metaDescription = '';

if($page_name != '')
{
	$query = "select * from custom_pages where seoname = '$page_name'";
	$res = mysql_query($query);
	$data = mysql_fetch_array($res);
	
	$heading = $data['pagetitle'];
	$heading2 = "<h2>".$data['pagetitle2']."</h2>";
	$content = html_entity_decode($data['contents']);
	
	/************** SEO Details ********************/
	if(trim($data['metatitle']) != '')
		$metaTitle = trim($data['metatitle']);
		
		
	if(trim($data['metakeywords']) != '')
		$metaKeywords = '<meta name="keywords" content="'.$data['metakeywords'].'" />';
		
		
	if(trim($data['metadescription']) != '')
		$metaDescription = '<meta name="description" content="'.$data['metadescription'].'" /> ';
	/************** SEO Details ********************/
}

else if($currentPostId != '')
{
	$query = "select * from posts where id = '$currentPostId'";
	$res = mysql_query($query);
	$data = mysql_fetch_array($res);
	
	$heading = $data['title'];
	$heading2 = '';
	$content = html_entity_decode($data['descr']);
	
	/************** SEO Details ********************/
	if(trim($data['metatitle']) != '')
		$metaTitle = trim($data['metatitle']);
		
	if(trim($data['metakeywords']) != '')
		$metaKeywords = '<meta name="keywords" content="'.$data['metakeywords'].'" />';
		
	if(trim($data['metadescription']) != '')
		$metaDescription = '<meta name="description" content="'.$data['metadescription'].'" /> ';
	/************** SEO Details ********************/
}

else if(isset($allPosts) && $allPosts == '1')
{
	$heading = 'All Posts';
	$heading2 = '';
	
	$condition = '1';
	$link1 = 'post.php';
	
	if(isset($_GET['type']) && $_GET['type'] != '')
	{
		$condition .= ' && recType = "'.$_GET['type'].'" ';
		$heading = ucFirst($_GET['type']);
		$link1 = $link1.'?type='.$_GET['type'];
	}
	
	/************** Paging ********************/
	$query = "SELECT *, date_format(dated,'%d %M, %Y') as createdate FROM posts WHERE $condition ORDER BY id DESC";	
	$max_records_per_page = MAX_RECORD_PER_PAGE;
	$pNum = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = ' limit 0 , ' . $max_records_per_page;
	$paging = array();
	$link = $link1;
	$paging = generatePaging($query,$link,$pNum,$max_records_per_page);
	$query = $query . $paging['limit'];
	/************** Paging ********************/

	$res = mysql_query($query);
	
	$content = '';
	if(mysql_num_rows($res) > 0)
	{
		while($data = mysql_fetch_array($res))
		{
			$content .= '<div class="container_r" style="clear:both;">
							<div class="heading_R">
								<div class="heading_r_l"></div>
								<div class="heading_r_c">
									<h2>'.$data['title'].'</h2>
									<p>'.$data['createdate'].'</p>
								</div>
								<div class="heading_r_r"></div>
							</div>
	
							<div class="General">
								<div class="banner">
									<p>'.html_entity_decode($data['shortdescr']).'</p>
								</div>
								<span class="continue"><a href="post.php?id='.$data['id'].'" title="Continue reading">Continue reading...</a></span>
							</div>							
						</div>
						<div style="clear:both;"></div>';
		}
		$content .= $paging['pagingString'];
	}
}

else if(isset($searchResults) && $searchResults == '1')
{
	$heading = 'Search Results';
	$heading2 = '';
	$noResult = '1';
	
	$condition = '1';
	$link1 = 'search.php';
	
	if(isset($_GET['keyword']))
	{
			$keyword = $_GET['keyword'];
			$content = '';	
			$content .= "<script>
							$(document).ready(function() {
								if($('#keyword')) {
							  		$('#keyword').val('".$keyword."');
							  	}
							});
						</script>";
						
			
					
/****************** Search For Pages ******************/
			$query = "SELECT * FROM custom_pages WHERE (pagetitle LIKE '%".$keyword."%' || 	pagetitle2 LIKE '%".$keyword."%' || contents LIKE '%".$keyword."%') ORDER BY id DESC";	
			$res = mysql_query($query);			
			if(mysql_num_rows($res) > 0)
			{
				$noResult = '0';
				while($data = mysql_fetch_array($res))
				{
					$title = $data['pagetitle'];
					$createDate = '';
					$description = substr(html_entity_decode($data['contents']),0,150);
					$linkUrl = 'page.php?id='.$data['id'];
					
					$content .= '<div class="container_r" style="clear:both;">
									<div class="heading_R">
										<div class="heading_r_l"></div>
										<div class="heading_r_c">
											<h2>'.$title.'</h2>
											<p>'.$createDate.'</p>
										</div>
										<div class="heading_r_r"></div>
									</div>
	
									<div class="General">
										<div class="banner">
											<p>'.$description.'</p>
										</div>
										<span class="continue"><a href="'.$linkUrl.'" title="Continue reading">Continue reading...</a></span>
									</div>							
								</div>
								<div style="clear:both;"></div>';
				}
			}
/****************** Search For Pages ******************/


/****************** Search For Posts (Blogs, Events, News) ******************/
			$query = "SELECT *, date_format(dated,'%d %M, %Y') as createdate FROM posts WHERE (title LIKE '%".$keyword."%' || shortdescr LIKE '%".$keyword."%' || descr LIKE '%".$keyword."%') ORDER BY recType ASC,id DESC";	
			$res = mysql_query($query);			
			if(mysql_num_rows($res) > 0)
			{
				$noResult = '0';
				while($data = mysql_fetch_array($res))
				{
					$title = $data['title'];
					$createDate = $data['createdate'];
					$description = html_entity_decode($data['shortdescr']);
					$linkUrl = 'post.php?id='.$data['id'];
					
					$content .= '<div class="container_r" style="clear:both;">
									<div class="heading_R">
										<div class="heading_r_l"></div>
										<div class="heading_r_c">
											<h2>'.$title.'</h2>
											<p>'.$createDate.'</p>
										</div>
										<div class="heading_r_r"></div>
									</div>
	
									<div class="General">
										<div class="banner">
											<p>'.$description.'</p>
										</div>
										<span class="continue"><a href="'.$linkUrl.'" title="Continue reading">Continue reading...</a></span>
									</div>							
								</div>
								<div style="clear:both;"></div>';
				}
			}
/****************** Search For Posts Blogs, Events, News ******************/

	}
	
	if($noResult == '1')
	{
		$content = '<div class="search" style="border: 1px #f2f2f2 solid; width:92%; padding:0 10px 10px 10px;">
					<h2>No Result Found</h2>
					<form name="search" id="search" method="get" action="search.php">
						<input name="keyword" id="keyword1" type="text" class="searchinput" value="'.$keyword.'"  />
						<input type="submit" name="Submit" id="Submit" value="search" />
					</form>		    
					</div>';
	}
}



$tpl->assign('HEADER_HEADING',$heading);
$tpl->assign('HEADER_HEADING2',$heading2);
$tpl->assign('PAGE_CONTENT',$content);
$tpl->assign('METATITLE',$metaTitle);
$tpl->assign('METAKEYWORDS',$metaKeywords);
$tpl->assign('METADESCRIPTION',$metaDescription);
/***********************************************************************/
?>
