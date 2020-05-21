<?php

require_once("database.php"); require_once("config.php");

$menu = '';

for ($i=0;$i<count($pages); $i++)
{
	if ($pages[$i]['link'] != 'direct')
	{
		$menu .= '<a  class="bc_menu" href="list.php?link=' . $i . '"><strong>';
		$menu .= $pages[$i]['title'];
		$menu .= '</strong></a>';
		
		if ($i+1 < count($pages) )
			 $menu .= '&nbsp;&nbsp;|&nbsp;&nbsp;';
	}
	else
	{
		$menu .= '<a  class="bc_menu" href="'.$pages[$i]['page'].'"><strong>';
		$menu .= $pages[$i]['title'];
		$menu .= '</strong></a>';

		if ($i+1 < count($pages) )
			 $menu .= '&nbsp;&nbsp;|&nbsp;&nbsp;';


	}
}
?>
<div class="hor_menu">
<?php
echo $menu; 
?>
</div>