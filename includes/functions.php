<?php
define("MAX_RECORD_PER_PAGE",10);

function generatePaging($sql,$link,$pageNum) {
	
	//if ($pageNum  == 1 ) {
			$tmpRes = mysql_query($sql);
			$totalRecs = mysql_num_rows($tmpRes);
			$_SESSION['TOTAL_RECORDS'] = $totalRecs;
	//}
		
		$posOfMark = strpos($link, "?");
		if($posOfMark === false)
		{
			$sign = "?";
		}
		else
		{
			$sign = "&";
		}
		
			
		$recStart = ( (int) ($pageNum-1) )* ((int) MAX_RECORD_PER_PAGE );
		$totalRecs = $_SESSION['TOTAL_RECORDS'];
		
		$totalPages = ceil( ( (int) $totalRecs ) / ( (int) MAX_RECORD_PER_PAGE ) );

		$pagingString = '<div class="pagination"><ul>';
		//$pagingString .= '<td align="left" class="bc_label" style="padding:5px">Showing page '. $pageNum.' of '. $totalPages .'</td>';
		
		$pagingStartPage = 1;
		$pagingEndPage = $totalPages ;
		
		if ($pageNum > 6 ) 
			$pagingStartPage = $pageNum - 5;
		
		if ($pageNum < ($totalPages - 5) ) 
			$pagingEndPage = $pageNum + 5;
		
		if ($pageNum > 1 ) {
			$prPage = $pageNum -1;			
			$pagingString .= '<li class="Prev_next"><a href="'. $link .$sign.'page=1" >&laquo; First</a></li> ';
			$pagingString .= '<li class="Prev_next"><a href="'. $link .$sign.'page='. $prPage .'" >&laquo; Previous</a></li>';
		}
		else
		{
			$pagingString .= '<li style="padding-left:175px;">&nbsp;</li>';
		}

		for($i=$pagingStartPage;$i<=$pagingEndPage;$i++) {
		
			if ($pageNum == $i) {
				$pagingString .= '<li class="PG_sel"><a href="'. $link .$sign.'page='.$i.'">' . $i . '</a></li>';
			} else {
				$pagingString .= '<li><a href="'. $link .$sign.'page='.$i.'">'.$i.'</a>';
			}			
		}
		if ($pageNum < $totalPages ) {
			$nePage = $pageNum + 1;
			$pagingString .= '<li class="Prev_next"><a href="'. $link .$sign.'page='. $nePage .'" >Next &raquo;</a></li> ';
			$pagingString .= '<li class="Prev_next"><a href="'. $link .$sign.'page='. $totalPages .'" >Last &raquo;</a></li>';
		}
		
		$pagingString .= '</ul><div class="clear"></div></div>';
		
		$sqlLIMIT = " LIMIT ". $recStart . " , " . MAX_RECORD_PER_PAGE;
		
		if ($totalPages == 1)
		{
			//$a['pagingString'] = '<div class="pagination"><ul><li style="width:100%; text-align:center; color: #005395; font-size:14px;">Showing page 1 of 1</li></ul><div class="clear"></div></div>';
			$a['limit'] = '';
		}
		else
		{
			$a['pagingString'] = $pagingString;
			$a['limit'] =  $sqlLIMIT;
		}
		
		return $a;
}

function makeThumbnail($imgName, $srcDir, $thDir, $maxWidth, $maxHeight) {
    if ($thDir != "") {
        copy($srcDir.$imgName, $thDir.$imgName);
        $srcFile = $thDir.$imgName;
    }
    else {
        copy($srcDir.$imgName, $srcDir.'th_'.$imgName);
        $srcFile = $srcDir.'th_'.$imgName;
    }
	chmod($srcFile,0777);
    
    $ext = strtolower(substr($srcFile,-3));
    $width  = $maxWidth;

    if (file_exists($srcFile) ) {
        $size        = getimagesize($srcFile);
        $IW             = $size[0];
        $IH             = $size[1];
        
        if ($IW < $maxWidth && $IH  < $maxHeight ) {
            $w = $IW;
            $h = $IH;
        }    
        else {
            if ($IW >= $IH) {
                $w = number_format($width, 0, ',', '');
                $h = number_format(($IH / $IW) * $width, 0, ',', '');
            }
            else {
                $ARW         = (float) ($size[0]/($IH-$IW));
                $ARH         = (float) ($size[1]/($IH-$IW));
                $h           = number_format($maxHeight, 0, ',', '');
                $tw             = (float)(($h * $ARW) / $ARH);
                $w           = number_format($tw, 0, ',', '');
                
                if ($w > $maxWidth) {
                    $howMuch   = $w - $maxWidth;
                    $reducePro = $howMuch/$ARW;
                    
                    $h  = $h - ( $ARH * $reducePro );
                    $w  = $w - ( $ARW * $reducePro );
                    $h  = number_format($h, 0, ',', '');
                    $w  = number_format($w, 0, ',', '');
                }
            }
            if ($h > $maxHeight ) {
                $w    = number_format(($w / $h) * $maxHeight, 0, ',', '');
                $h    = number_format($maxHeight, 0, ',', '');
            }
        }
    }
    
    $new_width = $w;
    $new_height = $h;
     
    $image_p = imagecreatetruecolor($new_width, $new_height);    
    if ($ext == 'jpg') {
        $image = imagecreatefromjpeg($srcFile);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $IW, $IH);
        imagejpeg($image_p, $srcFile, 500);
    }
    else if ($ext == 'png') {
        imagealphablending($image_p, false);
		imagesavealpha($image_p,true);
		$transparent = imagecolorallocatealpha($image_p, 255, 255, 255, 127);
		imagefilledrectangle($image_p, 0, 0, $new_width, $new_height, $transparent);
		$image = imagecreatefrompng($srcFile);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $IW, $IH);
        imagepng($image_p, $srcFile, 9);
    }
    else if ($ext == 'gif') {
        imagealphablending($image_p, false);
		imagesavealpha($image_p,true);
		$transparent = imagecolorallocatealpha($image_p, 255, 255, 255, 127);
		imagefilledrectangle($image_p, 0, 0, $new_width, $new_height, $transparent);
        $image = imagecreatefromgif($srcFile);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $IW, $IH);
        imagegif($image_p, $srcFile, 100);
    }
}


function sendMail($name,$email,$subject,$subject1,$message,$to)
{
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From:  <".$email.">\n";
	$headers .= 'X-Sender: <noreply@>\n';
	$headers .= 'X-Mailer: PHP\n';
	
	$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
				"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
					<head></head>
					<body>
						A new contact has been added. Details are as follows :-<br /><br />
						<table cellpadding="2" cellspacing="2">
							<tr><td>Name</td><td>'.$name.'</td></tr>
							<tr><td>Email:</td><td>'.$email.'</td></tr>
							<tr><td>Subject:</td><td>'.$subject1.'</td></tr>
							<tr><td>Message:</td><td>'.$message.'</td></tr>
						</table>
					</body>
				</html>';
				
	if(mail($to, $subject, $message, $headers))
	{
		return 1;
	}
}

function callPageHref($id) {
	$pageHref = mysql_result(mysql_query("SELECT seoname FROM custom_pages WHERE id = '$id' "),0);
	return "page.php?href=$pageHref";
}
?>
