<?php
session_start();
$alphanum = "123456789";
$rand = substr(str_shuffle($alphanum), 0, 4);
$_SESSION['captchaValue'] = md5($rand);
$image = imagecreate(45, 15);
$bgColor = imagecolorallocate ($image, 239, 239, 239);
$textColor = imagecolorallocate ($image, 0, 00, 00);
imagestring ($image, 5, 4, 0, $rand, $textColor);
header("Expires: Mon, 20 Jun 2000 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-type: image/png');
imagejpeg($image);
imagedestroy($image);
?>