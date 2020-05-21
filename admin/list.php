<?php
require_once("database.php"); 
require_once("header.php"); 

if ( $_SESSION['PREVIOUS_OPEN_LINK'] != $_GET['link'] ) {
	$_SESSION['SORT_DIRECTION'] = '';
	$_SESSION['ORDER_BY'] = '';
	$_SESSION['SEARCH_FIELD'] = '';
	$_SESSION['SEARCH_TERM'] = '';
}

$link 		= $_GET['link'];
$sucMessage = $_GET['msg'];

$pNum = isset($_GET['page']) ? $_GET['page'] : 1; 

$limit = ' limit 0 , ' . $max_records_per_page;


$page   			= $pages[$link]['page'];
$table  			= $pages[$link]['table'];
$filter 			= $pages[$link]['filter'];
$delete 			= $pages[$link]['delete'];
$addBtn 			= $pages[$link]['add'];
$default_order		= $pages[$link]['default_orderby_column'];
$show   			= $pages[$link]['show']; 
$add_new_button 	= $pages[$link]['add_new_button'];
$searchFieldsList 	= $pages[$link]['searchFieldsList'];
$orderFieldsList 	= $pages[$link]['orderFieldsList'];
$customSQL 			= $pages[$link]['customSQL'];
$group_by 			= $pages[$link]['group_by'];
$sorting 			= $pages[$link]['sorting'];
$viewpage 			= $pages[$link]['viewpage'];
$add_sort 			= $pages[$link]['add_sort_button'];
$title				= $pages[$link]['title'];


if(isset($pages[$link]['edit']) && ($pages[$link]['edit'] == 'no'))
{
	$edit = $pages[$link]['edit'];
}
else
{
	$edit = "yes";
}

if ($sorting != '') {
	$rs = mysql_query("select min(". $sorting .") as minOrder, max(". $sorting .") as maxOrder from " . $table); 
	if ($r = mysql_fetch_assoc($rs) ) {
		$minOrder = $r['minOrder'];
		$maxOrder = $r['maxOrder'];
	}
}

if($_GET["sdirection"] != "")
	processReOrder($table,$_GET["id"],$_GET["sdirection"],$sorting,'id');

$orderBy = '';

$eFilter = '';

if ($_SESSION['SORT_DIRECTION'] == '' )
	$_SESSION['SORT_DIRECTION'] = ' ASC ';

if ($_GET['direction'] != '' ) {
	if ($_GET['direction'] == 'asc')
		$_SESSION['SORT_DIRECTION'] = ' ASC ';
	else
		$_SESSION['SORT_DIRECTION'] = ' DESC ';	
}

if ($_SESSION['ORDER_BY'] == '' )
	$_SESSION['ORDER_BY'] = $default_order;

if ($_GET['order'] != '') 
	$_SESSION['ORDER_BY'] =  $_GET['order'];


if ($_SESSION['ORDER_BY'] != '' )
	$orderBy = ' ORDER BY ' . $_SESSION['ORDER_BY'] . $_SESSION['SORT_DIRECTION'];



if ($_GET['search'] != '' && $_GET['term'] != '') {

	$_SESSION['SEARCH_FIELD'] =  $_GET['search'];
	$_SESSION['SEARCH_TERM']  =  $_GET['term'];

} else {

	$_SESSION['SEARCH_FIELD'] =  '';
	$_SESSION['SEARCH_TERM']  =  '';

}


if ($_SESSION['SEARCH_FIELD'] != '' && $_SESSION['SEARCH_TERM'] != '' ) {

	$eFilter = '';

	if ($_SESSION['SEARCH_FIELD'] == 'all' ) {

		 $res1 = mysql_query("DESC $table"); 
		 while ($row = mysql_fetch_assoc($res1) ) 
		 	$eFilter .= $row['Field'] . " LIKE '%". $_SESSION['SEARCH_TERM'] ."%' OR ";

		 $eFilter = substr($eFilter,0,-3);

	} else {
		$eFilter = $_SESSION['SEARCH_FIELD'] . " LIKE '%". $_SESSION['SEARCH_TERM'] ."%'";
	}

} else {
	$eFilter = '';
}

if ($filter != "") {

	$filter = " where " . $filter ;
	if ($eFilter != "")
		$filter = $filter . ' AND ('. $eFilter .')';
} else {
	if ($eFilter != "")
		$filter = " where " . $eFilter;
}

$group_by_sql = '';
if ($group_by != '')
	$group_by_sql = ' GROUP BY ' . $group_by . ' ';
	
if ($customSQL == '' ) 
	$sql = "select * from " . $table . $filter  . $group_by_sql . $orderBy;
else
	$sql = $customSQL  . $filter . $orderBy;

$paging = array();

$link1 = 'list.php?link=' .$link;
$paging = generatePaging($sql,$link1,$pNum,$max_records_per_page);

$sql = $sql . $paging['limit'];
//echo $sql;

$res = mysql_query($sql) or die(mysql_error());
//Name
?>

<script>
function setOder(val)
{

	url  = document.location.href;
	st = url.indexOf("&order=");
	if (st != -1 )
		url = url.substring(0,st);
	document.location.href = url + '&order=' + val;
}

function setSearch()
{

	fld = document.getElementById("field").value;
	val = document.getElementById("term").value;
	url  = document.location.href;
	st = url.indexOf("&search=");
	if (st != -1 )
		url = url.substring(0,st);

	document.location.href = encodeURI(url + '&search=' + fld + '&term='+val);
}

function highlight(elem)
{
	elem.className = 'highlight';
}

function dehighlight(elem)
{
	elem.className = 'tr_default';
}

function removeAlert(url)
{
	var con = confirm("Are you sure to delete this entry?")
	if (con) 
		window.location.href = url;
}
</script>












  <div class="container_r">
    <div class="heading_R">
      <div class="heading_r_l"></div>
      <div class="heading_r_c">
        <h2 class="TB_text"><?php echo $title; ?></h2>
        
        
        <?php if (count($orderFieldsList) > 0 ) {  ?>
		    <div class="heading_order">
		      <label>Order By :</label>
		      	<select name="field" id="field" onchange="setOder(this.value)">
				  <?php
				  foreach ($orderFieldsList as $key => $value) {
				  	$sel = '';
					if ( $value == $_SESSION['ORDER_BY'])
						$sel = ' selected="selected" ';

				  	echo '<option value="'. $value .'" '. $sel .'>' . $key . '</option>';
				  }
				?>
				</select>
				
				<?php
					if ( $_SESSION['SORT_DIRECTION'] == ' ASC ' ) {
						$dirc = 'desc';
						$dimg = 'asc1.gif';
						$txt  = ' Desending ';
					} else {
						$dirc = 'asc';
						$dimg = 'desc1.gif';
						$txt  = ' Ascending ';
			
					}	
				?>
				
		      <a href="list.php?link=<?=$link?>&direction=<?=$dirc?>"><?=$txt?></a>
		    </div>
        <?php  }  ?>
        
      </div>
      <div class="heading_r_r"></div>
    </div>
    
    
    <div class="TB_search">
      <form action="">
      	<?php if (count($searchFieldsList) > 0 ) { ?>
		    <input type="text" name="term" id="term" value="<?php if(isset($_SESSION['SEARCH_TERM']) && ($_SESSION['SEARCH_TERM'] != '')) { echo $_SESSION['SEARCH_TERM']; } else { echo 'Search for'; } ?>" onclick="if(this.value=='Search for') { this.value=''; }" onblur="this.value=!this.value?'Search for':this.value;"/>
		    
		    <select name="field" id="field">
			  <option value="all">All</option>
			  <?php
			  foreach ($searchFieldsList as $key => $value) {
			 	$sel = '';
				if ( $value == $_SESSION['SEARCH_FIELD'])
					$sel = ' selected="selected" ';

			  	echo '<option value="'. $value .'" '. $sel .'>' . $key . '</option>';
			  }
			?>
			</select>
			
		    <div class="HT_search"> <a title="Search" onclick="setSearch();"><span>Search</span></a> </div>
        <?php } ?>
        
        <?php if ( $addBtn != 'no' )  {  ?><div class="HT_search add_banner"> <a title="<?=$add_new_button?>" onclick="document.location.href='<?php echo $page; ?>'"><span><?=$add_new_button?></span></a> </div><?php  }  ?>
      </form>
    </div>
    
    <?php if ($res) { ?>
		<?php  if ($sucMessage != "" ) echo '<p class="error">'.$sucMessage . '</p>';  ?>
		
		<div class="banner_actions">
		  <div class="BA_heading">
		    <h2><?php foreach ($show as $key => $value) { echo '<th>'.$key.'</th>'; } ?></h2>
		    <h3>Action</h3>
		    <div class="clear"></div>
		  </div>
		  
		  
		  <div class="BA_heading">
		  
		    <?php while ($row = mysql_fetch_assoc($res) ) {

				$id		   	= $row['id'];
				
				$pos = strpos($page,"?");
				if($pos === false) {
					$eLink	   	= $page . "?id=" . $id;
				} else {
					$eLink	   	= $page . "&id=" . $id;
				}
				$dLink = '';

				if ($delete == "yes") {
					$ur	   		= "delete.php?id=$id&table=$table&link=$link&page=$pNum" ;
					$dLink	   	= '<a href="javascript:void(0)" onclick="removeAlert(\''. $ur .'\')" class="bc_menu"><img src="images/icon21.png" border="0" /></a>';
				} else
					$dLink	   = "<span class='bc_menu' style='color:#CCCCCC'><img src='images/icon21.png' border='0' /></span>" ;		
		
				if ($viewpage != '')
					$viewpagelink = ' - <a target="_blank" class="bc_menu" href="../'. $viewpage . '?id=' . $id .'">Live Page</a>';
			?>
					
		      <div class="banner_box">
				    <?php foreach ($show as $key => $value) {
							if( $value == 'publish_date' ) { 
					  			echo '<h4 style="cursor:pointer" onclick="window.location.href=\''.$eLink.'\'" >'.dated($row[$value], 'm/d/Y').'</h4>'; 
					  		} else {
					  			if($key == 'Image') { $show_val = "<img src='../images/uploads/".$row[$value]."' border=0 style='height:65px; border:1px black solid;' />"; } else { $show_val = $row[$value]; }
					  			echo '<h4 style="cursor:pointer" onclick="window.location.href=\''.$eLink.'\'" >'.$show_val.'</h4>';
					  		}
						  }
					  ?> 
				  <?=$dLink?><?=$viewpagelink?>
				  <?php if($edit != 'no') { ?> <a class="bc_menu" href="<?=$eLink?>"><img src="images/icon20.png" border="0" /></a> <?php } ?>	
		      </div>
		      
		   <?php } ?>   
		   
		    <div class="clear"></div>
		  </div>
		  
		  <?php echo $paging['pagingString']; ?>		
		</div>
    
	<?php } else { ?>
		No Current Record
	<?php } ?>    
    
    
    <div class="clear"></div>
  </div>  
  <div class="clear"></div>    










<?php
require_once("footer.php"); 

$_SESSION['PREVIOUS_OPEN_LINK'] = $_GET['link'];

?>
