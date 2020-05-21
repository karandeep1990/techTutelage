<?php 
require("database.php");

$action 				= mysql_real_escape_string($_POST['action']); 
$updateRecordsArray 	= $_POST['recordsArray'];


if ($action == "updateProductsListings"){
	
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		
		$query = "UPDATE products SET imageListingID = " . $listingCounter . " WHERE id = " . $recordIDValue;
		$res = mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;	
	}
	if($res == 1)
	{
		echo "Products Reordered.";
	}	
}

else if ($action == "updateHomePageImageListings"){
	
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		
		$query = "UPDATE banners SET imageListingID = " . $listingCounter . " WHERE id = " . $recordIDValue;
		$res = mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;	
	}
	if($res == 1)
	{
		echo "Banners Reordered.";
	}
}
?>
