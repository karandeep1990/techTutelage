<?php
	require_once("database.php");
	require_once("header.php");
?>

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jscripts/jquery_ui/js/jquery-ui-1.7.3.custom.min.js"></script>

<style>
  ul {
    margin: 0;
  }

 #contentWrap {
   float: left;
    height: auto;
    overflow: hidden;
    padding: 0 0 0 63px;
    width: 600px;
 }

 #contentLeft {
    width: 600px;
   	float:left;
    height: auto;
    overflow: hidden;
  }
  
  #contentLeft ul {
	width:600px;	
  }
  
  #contentLeft li {
    background-color: #C2C2C2;
    border: 1px solid #777777;
    color: #666666;
    float: left;
    list-style: none outside none;
    margin: 0 0 4px 4px;
    padding: 5px;
    width: 180px;
    cursor:pointer;
  }
  #contentRight {
    width: 100%;
    background-color:transparent;
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
        	
          $("#contentLeft ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
          
              var order = $(this).sortable("serialize") + '&action=updateHomePageImageListings';
              $.post("updateProductsDB.php", order, function(theResponse){
				$("#contentRight").css('display','block');
				$("#contentRight").html(theResponse).fadeOut(3000);

              });
            }
          });
        });

      });
</script>


<?php
$topNavTable = 1;
$Sql = mysql_query("select * from banners order by imageListingID asc");

?>

<div class="container_r">
	<div class="heading_R">
	  <div class="heading_r_l"></div>
	  <div class="heading_r_c">
	    <h2>Reorder Banners</h2>
	  </div>
	  <div class="heading_r_r"></div>
	</div>
	<div class="clear"></div>
	<div style="height:25px;"><p class="error" id="contentRight" style="display:none;"></p></div>
	
	<div class="General_2" style="margin-left:15px;">
  		<div id="contentLeft">
			<ul>
			  <?php
			  	if(mysql_num_rows($Sql) >= 1)
			  	{
			  		$countbanner = 0;
					while($res = mysql_fetch_array($Sql))
					{
						$countbanner = $countbanner+1;
				    ?>
			  			<li id="recordsArray_<?php echo $res['id']; ?>"><img src = "../images/uploads/<?php echo $res['name']; ?>" width="178" height="100" /></li> 			  			
				  <?php
					}
				}
			   ?>
			</ul>
	    </div>
	</div>
</div>
<div class="clear"></div>

<?php require_once("footer.php"); ?>

