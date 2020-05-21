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
   float: left;
    height: auto;
    overflow: hidden;
    padding: 0 0 0 63px;
    width: 1050px;
  }

  #contentTop {
    width: 600px;
    padding: 5px;
    margin-left: 30px;
  }

  #contentLeft {
    width: 1050px;
   	float:left;
    height: auto;
    overflow: hidden;
  }

  #contentLeft li {
    background-color: #C2C2C2;
    border: 1px solid #777777;
    color: #666666;
    float: left;
    list-style: none outside none;
    margin: 0 0 4px 4px;
    padding: 5px;
    width: 147px;
    cursor:pointer;
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
        	
          $("#contentLeft ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
          
              var order = $(this).sortable("serialize") + '&action=updateProductsListings';
              $.post("updateProductsDB.php", order, function(theResponse){
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
$Sql = mysql_query("select * from products order by imageListingID asc");

?>
<div id="debug"></div>
<div class="bc_heading">Reorder Products</div>
<p style="text-align:center; font-style:italic; font-size:12px; color:#666666;"> * All Products * </p>
<span id="contentRight" style="float:right;"></span>
<div style="clear:both; height:15px;"></div>

<div id="contentWrap">	
  <div id="contentLeft">
    <ul>
      <?php
      	if(mysql_num_rows($Sql) >= 1)
      	{
			while($res = mysql_fetch_array($Sql))
			{
          ?>
      <li id="recordsArray_<?php echo $res['id']; ?>"><img src = "../images/uploads/<?php echo $res['image']; ?>" /></li>
          <?php
        	}
        }
       ?>
    </ul>
  </div>
</div>
