<?php
require_once("database.php");
require_once("header.php");
require_once("config.php");

$link   = (int)$_GET['link'];
$table	= $pages[$link]['table'];
$field  = 'reorder';
$title  = $pages[$link]['sortDisplayField'];

?>
<div id="info">&nbsp;</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">    
    <tr><td height="10" colspan="2" class="bc_heading">Re-Order <?=$pages[$link]['title']?></td></tr>
    <tr><td style="padding: 10px;"><font color="red">Drag and Drop to sort items. It will save the order automatically.</font></td></tr>
    <tr>
    <td colspan="2">
        <ul id="reOrder">
            <?php
                $q = mysql_query("SELECT * FROM $table ORDER BY $field asc") or die(mysql_error());
                while( $r = mysql_fetch_assoc($q) ) {
                    $id = $r['id'];
                    $name = DBout($r["$title"]);
                    echo '<li id="li_'.$id.'"><img src="images/arrow.png" alt="move" width="16" height="16" class="handle" /> '.$name.'</li>';
                }
            ?>
        </ul>
    </td>
    </tr>
</table>

<?php require_once("footer.php"); ?>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/dragable.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#reOrder").sortable({
      handle : '.handle',
      update : function () {
		  var order = $('#reOrder').sortable('serialize');
  		$("#info").load("reOrder.php?tbl=<?=$table?>&fld=<?=$field?>&" + order);
      }
    });
});
</script>
<style type="text/css">
#info {
	display: block;
}
#reOrder {
    width: 100%;
	list-style: none;
    background-color: fuchsia;
}
#reOrder li {
    float: left;
	padding: 5px 10px;
    margin-bottom: 1px;
    margin-right: 1px;
    width: 31%;
	background-color: #efefef;
}
#reOrder li img.handle {
	margin-right: 20px;
	cursor: move;
}
</style>