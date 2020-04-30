<?php require('header.php'); ?>

<?php
if(isset($_GET['href']) && $_GET['href'] != '')
{
	$currentPostHref = $_GET['href'];
	$query = "select * from posts where href = '$currentPostHref'";
	$res = mysql_query($query);
	$data = mysql_fetch_array($res);
	
	$heading = $data['title'];
	$heading2 = '';
	$content = html_entity_decode($data['descr']);
	
	if($data['fileName'] != '') {
		$content .= '<p style="text-align:right; font-weight:bold;"><a href="download.php?name='.$data['fileName'].'">More Details</a></p>';
	}
	
	/************** SEO Details ********************/
	if(trim($data['metatitle']) != '')
		$metaTitle = trim($data['metatitle']);
		
	if(trim($data['metakeywords']) != '')
		$metaKeywords = '<meta name="keywords" content="'.$data['metakeywords'].'" />';
		
	if(trim($data['metadescription']) != '')
		$metaDescription = '<meta name="description" content="'.$data['metadescription'].'" /> ';
	/************** SEO Details ********************/
}

else
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
		$metaTitle = $heading;
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
			$href = $data['href'];
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
									<p>'.substr(strip_tags(html_entity_decode($data['shortdescr'])),0,150).'</p>
								</div>
								<span class="continue"><a href="post.php?href='.$href.'" title="Continue reading">Continue reading...</a></span>
							</div>							
						</div>
						<div style="clear:both;"></div>';
		}
//		$content .= $paging['pagingString'];
	}
	else
	{
		$content = '<div class="search" style="border: 1px #f2f2f2 solid; width:92%; padding:0 10px 10px 10px;">
						<h2>No Record Found</h2>
					</div>';
	}
}
?>

<?php require('footer.php'); ?>
