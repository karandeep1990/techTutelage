<?php require('header.php'); ?>

<?php
if(isset($_GET['href']) && $_GET['href'] != '') {	
	$currentPageHref = $_GET['href'];
	$query = "select * from custom_pages where seoname = '$currentPageHref'";
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
if($data['headerImage'] != '') {
	$headerImage = '<img width="571" alt="image" src="images/uploads/'.$data['headerImage'].'">';
}
	
?>

<?php require('footer.php'); ?>
