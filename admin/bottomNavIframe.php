<?php
require_once("database.php");
?>

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jscripts/jquery_ui/js/jquery-ui-1.7.3.custom.min.js"></script>

<style>
  ul {
    margin: 0;
  }

  #contentWrap {
    width: 430px;
    margin: 0 auto;
    height: auto;
    overflow: hidden;
  }

  #contentTop {
    width: 600px;
    padding: 5px;
    margin-left: 30px;
  }

  #contentLeft {
    float: left;
    width: 100%;
  }

  #contentLeft li {
    list-style: none;
    margin: 0 0 4px 0;
    padding: 5px;
    background-color:#c2c2c2;
    border: #777777 solid 1px;
    color:#666666;
  }
  #contentRight {
    width: 100%;
    background-color:transparent;
    color:#000000;
    text-align:center;
    height:30px;
    padding-top:10px;
  }

  .bc_heading {
    background-color:#777777;
    color:#FFFFFF;
    font-family:Verdana,Arial,Helvetica,sans-serif;
    font-size:14px;
    font-weight:bold;
    height:25px;
    text-align:center;
    padding-top:5px;
  }

</style>

<script type="text/javascript">
  $(document).ready(function(){

    $(function() {
      $("#contentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
          var order = $(this).sortable("serialize");
          $.post("updateNavDb.php?type=bottom", order, function(theResponse){
            $("#contentRight").css('display','block');
            $("#contentRight").css('color','red');
            $("#contentRight").html(theResponse).fadeOut(3000);
          });
        }
      });
    });

  });
</script>


<?php
$topNavTable = 1;
$Sql = mysql_query("select * from topNav WHERE navArray != '' AND type='bottom'");
if(mysql_num_rows($Sql) < 1) {
  $Sql = mysql_query("select * from custom_pages ORDER BY id ASC");
  $topNavTable = 0;
}
else {
  $res = mysql_fetch_array($Sql);
  $serializeNav = $res['navArray'];
  $topNav = unserialize($serializeNav);
}
?>

<div class="bc_heading">Manage Bottom Navigation order</div>


<p style="text-align:center; font-style:italic; font-size:12px; color:#666666;"> * Top 5 Links will show in Bottom Navigation * </p>
<span id="contentRight" style="float:right;" class="success"></span>
<div style="clear:both; height:15px;"></div>

<div id="contentWrap">
  <div id="contentLeft">
    <ul>
      <?php if($topNavTable == 0) {
        while($pages = mysql_fetch_array($Sql)) { ?>

      <li id="recordsArray_<?php echo $pages['id']; ?>"><?php //echo $pages['id']; ?> <?php echo $pages['pagetitle']; ?></li>
          <?php }
      }
      else {
        foreach($topNav as $k=>$v) {
          $selectPage = mysql_query("select * from custom_pages WHERE id = '$v'");
          $pageInfo = mysql_fetch_array($selectPage);
          ?>
      <li id="recordsArray_<?php echo $pageInfo['id']; ?>"><?php //echo $pageInfo['id']; ?> <?php echo $pageInfo['pagetitle']; ?></li>
          <?php
        }
      } ?>
    </ul>
  </div>
</div>
