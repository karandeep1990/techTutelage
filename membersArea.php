<?php require('header.php'); ?>

<?php
if(isset($_GET['type']) && $_GET['type'] != '') {	
	$recType = $_GET['type'];
	$heading = '';
	$heading2 = '';
	
	if($recType == 'archives') {
		$recType1 = 'archives';
		$heading = 'Archives';
	} else if($recType == 'grievances') { 
		$recType1 = 'grievances';
		$heading = 'Grievances';
	} else if($recType == 'legislativematters') { 
		$recType1 = 'legislative';
		$heading = 'Legislative Matters';
	} else if($recType == 'hottopics') { 
		$recType1 = 'hot';
		$heading = 'Hot Topics';
	}


	$showCats = '0';
	if($recType1 == 'grievances') {
		$showCats = '1';
		$catListQuery = "SELECT * FROM membersAreaCategories ORDER BY catTitle ASC";
		$catListObj = mysql_query($catListQuery);
	}	

	if($showCats == '1') {
		$query = "select ma.*, mac.catTitle from membersArea ma LEFT JOIN membersAreaCategories mac ON (ma.catId = mac.id) where ma.recType = '$recType1' ORDER BY mac.catTitle";
	} else {
		$query = "select * from membersArea where recType = '$recType1'";
	}
	
	$res = mysql_query($query);
	
	$content = '';
	$count = 0;
	$countCat = 0;
	
	
	$lastCat = '';
	while($data = mysql_fetch_array($res)) {
	
		if(isset($data['catTitle']) && ($data['catTitle'] != $lastCat)) {
			$countCat = $countCat+1;
			$content .= "<p style='font-weight:bold; font-size:14px; font-style:italic;'>".$countCat.") ".$data['catTitle']."</p>";
			$lastCat = $data['catTitle'];
			$count = 0;
		}
		$count = $count+1;
		
		$content .= "<p style='padding-left:20px;'>";
		
		if($data['fileName'] != '') {
			$linkStart = '<a href="download.php?name='.$data['fileName'].'">';
			$linkEnd = '</a>';
		} elseif($data['linkUrl'] != '') {
			$linkStart = '<a href="'.$data['linkUrl'].'">';
			$linkEnd = '</a>';
		} else {
			$linkStart = '<a href="#">';
			$linkEnd = '</a>';
		}
		
		$content .= $count.") ".$linkStart.$data['title'].$linkEnd;
		$content .= "</p>";		
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

$headerImage = '';
?>

<?php require('footer.php'); ?>
