<?php
require_once("header.php");
require_once("database.php");

$id = $_GET['id'];

$sql = "SELECT * FROM `ask_camera_man` where `id` = $id;";
if($exec = mysql_query($sql)) {
  $row = mysql_fetch_array($exec);
} else {
  header("Location:ask-details.php");
  exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = DBin($_POST["id"]);
  $to = DBin($_POST["to"]);
  $subject = DBin($_POST["subject"]);
  $contents = DBin($_POST["contents"]);
  $from = DBin($_POST["from"]);


  $headers = 'From: '. $from ."\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


  //echo $debug =  $to . '<br>' . html_entity_decode($contents) . '<hr>' . $headers ;die;
  $answer = html_entity_decode($contents);
  $sent = mail($to, $subject, $answer , $headers);
  $sql = "SELECT `replies` FROM `ask_camera_man` WHERE `id` = $id; ";
  if($exec = @mysql_query($sql)) {
    $row = @mysql_fetch_array($exec);
    $replies = $row["replies"]+1;
    $time = time();
    $sql2 = "UPDATE `ask_camera_man` SET `answer` ='$answer', `replies` = '$replies', `last_reply_timestamp`= $time WHERE `id` = $id;";
    @mysql_query($sql2);
  }

  @header("Location:ask-details.php");
  echo '<meta http-equiv="refresh" content="0;url=ask-details.php" />';
  exit();


}

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

  <tr><td colspan="2" align="right" class="bc_heading">Reply to client</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>

  <form method="post" name="bc_form" enctype="multipart/form-data" action="">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />

    <tr>
      <td class="bc_input_td" align="right"><strong>To :</strong></td>
      <td class="bc_input_td"><input type="text" name="to" value="<?php echo $row["email"] ?>" style="width:400px;" tabindex="1" /></td>
    </tr>
    <tr>
      <td class="bc_input_td" align="right"><strong>Subject :</strong></td>
      <td class="bc_input_td"><input type="text" name="subject" value="" style="width:400px;" tabindex="2" /></td>
    </tr>
    <tr valign="top">
      <td class="bc_input_td" align="right"><br /><strong>Mail Contents:</strong></td>
      <td class="bc_input_td"><textarea name="contents" style="width:600px;height:300px;" id="descr" tabindex="3"></textarea></td>
    </tr>
    <tr>
      <td class="bc_input_td" align="right"><strong>From:</strong></td>
      <td class="bc_input_td"><input type="text" name="from" value="noreply@hanscomk.com" style="width:400px;" tabindex="4" /></td>
    </tr>
    <tr><td colspan="2" align="center"><input name="submit" type="submit" value="Send Mail" class="bc_button" tabindex="5" /></td></tr>
  </form>

</table>


<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
  tinyMCE.init({
    mode : "exact",
    elements : "descr",
    theme : "advanced",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,forecolor,backcolor,bullist,numlist,outdent,indent,blockquote,anchor,cleanup",
    theme_advanced_buttons2 : "cut,copy,paste,styleselect,formatselect,fontselect,fontsizeselect,hr,code,help,insertimage,image",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,
    relative_urls : false,
    document_base_url : "<?php echo ABSOLUTE_PATH; ?>",
    plugins : "inlinepopups,imagemanager",
  });
</script>
