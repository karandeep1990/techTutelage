<?php require('header.php'); ?>

<?php
$heading = 'Search Results';
$metaTitle = $heading;

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
				$description = substr(strip_tags(html_entity_decode($data['shortdescr'])),0,150);
				
				$postId = $data['id'];
				//$linkUrl = 'post.php?id='.$postId;
				$href = $data['href'];
				$linkUrl = "post.php?href=$href";
				
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
				$description = substr(strip_tags(html_entity_decode($data['contents'])),0,150);
				
				//$linkUrl = 'page.php?id='.$data['id'];
				$href = $data['seoname'];
				$linkUrl = "page.php?href=$href";
				
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
?>

<?php require('footer.php'); ?>
