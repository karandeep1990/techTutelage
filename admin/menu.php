<?php
require_once("database.php");
require_once("config.php");

/************************ Left Menu ***************************/
  $Parent_last = '';
  $cntid = 100;
  $LeftMenu = '';
  
  for( $link=0; $link<count($pages); $link++ )
  {
  	$link_last = $link-1;
    $Parent 	= $pages[$link]['Parent'];
    $link_next = $link+1;

    $linkTitle 		= $pages[$link]['title'];
    $linkDirect 	= $pages[$link]['page'];
    $linkList   	= "list.php?link=$link";
    $linkIcon 		= $pages[$link]['icon'];
    $linkCurrent 	= ( (isset($_GET['link']) && $_GET['link'] == $link) || ( $linkDirect == basename($_SERVER['PHP_SELF']) ) )   ? 'class="selected"' : '';

    if($Parent != $Parent_last)
    {
      $cntid = $cntid+1;    
      $LeftMenu .= '<div class="detail_1"><ul>';
    }

    if( $pages[$link]['id'] )
    {
      $ParentID  = $pages[$link]['id'];

      if( $pages[$link]['type'] == 'parent' )
      {
        $LeftMenu .= '<li><a href="javascript:return false;" class="togSub" id="'.$ParentID.'">'.$linkTitle.'</a>' . "\n";
        $LeftMenu .= childs( $pages, $ParentID, $link );
        $LeftMenu .= '</li>' . "\n";
      }
    }
    else
      $LeftMenu .= ( $pages[$link]['link'] == 'direct' ) ? '<li><img src="images/'.$linkIcon.'" alt="" /><a '.$linkCurrent.' href="'.$linkDirect.'">'.
          $linkTitle.'</a></li>' : '<li><img src="images/'.$linkIcon.'" alt="" /><a '.$linkCurrent.' href="'.$linkList.'">'.$linkTitle.'</a></li>' . "\n";


    $link_next = $link+1;
    $Parent_next 	= $pages[$link_next]['Parent'];
    
    
    if($Parent != $Parent_next)
    {
      $LeftMenu .= '</ul><div class="clear"></div></div><div class="clear"></div>';
    }

    $Parent_last = $Parent;

  }  
/************************ Left Menu ***************************/
?>

<?php 
	echo $LeftMenu;
	//echo "<tr><td colspan=2>".$leftNav."</td></tr>";
?>

