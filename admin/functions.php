<?php

function dated($d,$f) {
	$t = strtotime($d);
	return date( $f,$t );
}
function sl($f,$s) {
	return ( $f == $s ) ? 'selected=""' : '';
}

function getRewriteString($sString) {
	$string = strtolower(htmlentities($sString));
	$string = preg_replace("/&(.)(uml);/", "$1e", $string);
	$string = preg_replace("/&(.)(acute|cedil|circ|ring|tilde|uml);/", "$1", $string);
	$string = preg_replace("/([^a-z0-9]+)/", "-", html_entity_decode($string));
	$string = trim($string, "-");
	return $string;
}

function adminAuthentication($username, $password) {
		$sql = "select * from bc_admin where name='". $username ."' and password='". $password ."'";
		$res = mysql_query($sql);
		if (mysql_num_rows($res) > 0)
		 return true;
		else
		 return false;
}

function generatePaging($sql,$link,$pageNum) {
	
	//if ($pageNum  == 1 ) {
			$tmpRes = mysql_query($sql);
			$totalRecs = mysql_num_rows($tmpRes);
			$_SESSION['TOTAL_RECORDS'] = $totalRecs;
	//}
		
		$posOfMark = strpos(getBreadcrumb($link), "?");
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
			$pagingString .= '<li class="Prev_next"><a href="'. getBreadcrumb($link) .$sign.'page=1" >&laquo; First</a></li> ';
			$pagingString .= '<li class="Prev_next"><a href="'. getBreadcrumb($link) .$sign.'page='. $prPage .'" >&laquo; Previous</a></li>';
		}
		else
		{
			$pagingString .= '<li style="padding-left:175px;">&nbsp;</li>';
		}

		for($i=$pagingStartPage;$i<=$pagingEndPage;$i++) {
		
			if ($pageNum == $i) {
				$pagingString .= '<li class="PG_sel"><a href="'. getBreadcrumb($link) .$sign.'page='.$i.'">' . $i . '</a></li>';
			} else {
				$pagingString .= '<li><a href="'. getBreadcrumb($link) .$sign.'page='.$i.'">'.$i.'</a>';
			}			
		}
		if ($pageNum < $totalPages ) {
			$nePage = $pageNum + 1;
			$pagingString .= '<li class="Prev_next"><a href="'. getBreadcrumb($link) .$sign.'page='. $nePage .'" >Next &raquo;</a></li> ';
			$pagingString .= '<li class="Prev_next"><a href="'. getBreadcrumb($link) .$sign.'page='. $totalPages .'" >Last &raquo;</a></li>';
		}
		
		$pagingString .= '</ul><div class="clear"></div></div>';
		
		$sqlLIMIT = " LIMIT ". $recStart . " , " . MAX_RECORD_PER_PAGE;
		
		if ($totalPages == 1)
		{
			$a['pagingString'] = '<div class="pagination"><ul><li style="width:100%; text-align:center; color: #005395; font-size:14px;">Showing page 1 of 1</li></ul><div class="clear"></div></div>';
			$a['limit'] = '';
		}
		else
		{
			$a['pagingString'] = $pagingString;
			$a['limit'] =  $sqlLIMIT;
		}
		
		return $a;
}

function getBreadcrumb($str)
{
	//$str = $_SERVER['REQUEST_URI'];
	return $str;
}

function replace_NonAlphaNumChars($string,$table,$column,$id) {
		$string=strtr($string,"ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ",
    	 				  	  "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
		
		$string = preg_replace('/[^a-z0-9]/i', '-', $string);
		$string = preg_replace('/[-]+/', '-', $string);
		$string = strtolower($string);
		$string = trim($string,"-");
	    $string = explode("-", $string);
	    $string = array_slice($string, 0, 30);
	    $string = join("-", $string);
		$string = trim($string, "-");
		
    	if($id){
    		$sql = "SELECT  (SELECT  max(id) as id FROM ".$table."), ".$column."  FROM ".$table." 
    		WHERE ".$column." = '".$string."' AND id!=".$id;
    	}
    	else{
    		$sql = "SELECT  (SELECT  max(id) as id FROM ".$table."), ".$column."  FROM ".$table." 
    		WHERE ".$column." = '".$string."'";
    	}
		$res = mysql_query($sql);
		if($res) {
				if(mysql_num_rows($res)) {
					$row = mysql_fetch_array($res);
					$id = $row['id']+1;
					$string .= "-".$id;
					$string = replace_NonAlphaNumChars($string,$table,$column,$id);	
				}
		}
    		
    	return $string;
}

function DBin($string) {
	return  trim(htmlspecialchars($string,ENT_QUOTES));
}

function DBout($string) {
	$string = trim($string);
	$string = html_entity_decode($string);
	$string = str_replace("<p?&nbsp;</p>","<br><br>",$string);
	$string = str_replace("Â"," ",$string);
	return utf8_encode($string);
}

function validateEmail($email) {
	if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
		return true;
	else	
		return false;
}

function keyGen() {
	return time();
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

function config($id) {
	$q = mysql_query("select value from settings where id='$id' limit 1");
	$r = mysql_fetch_assoc($q);
	return stripcslashes($r['value']);
}

function category_dropdown($s=0) {
    $html = '';
    $q = mysql_query("select id,name from categories order by id asc") or die(mysql_error());
    while( $r = mysql_fetch_assoc($q) ) {
        $id = $r['id'];
        $name = DBout($r['name']);
        $sl = ( $s == $id ) ? 'selected=""' : '';
        $html .= '<option value="'.$id.'" '.$sl.'>'.$name.'</option>';
    }
    return $html;
}
function prodFeature($id,$limit=1) {
    $html = '';
    $q = mysql_query("select prod_feat from products_features where prod_id='$id' limit $limit");
    while( $r = mysql_fetch_array($q) ) {
        $html .= DBout($r['prod_feat']) . ' ';
    }
    return $html;
}
function BuildSQL($dbTable, $action, $fieldNames, $fieldValues, $where) {
	if (count($fieldNames) != count($fieldValues)) return 'columns count not matched';
	$sqlFieldNames = '';
    $sqlFieldValues = '';
    
	switch (strtolower($action)) {
		case "insert" :
			for ($i = 0; $i < count($fieldNames); $i++) {
				$sqlFieldNames .= '`'. $fieldNames[$i] . '`, ';
				$sqlFieldValues .= '"' . $fieldValues[$i] . '", ';
			}
			return "INSERT INTO $dbTable (" . substr($sqlFieldNames, 0, -2) . ") VALUES (" . substr($sqlFieldValues, 0, -2) . ")";
		break;
			
		case "update" :
			for ($i = 0; $i < count($fieldNames); $i++) {
				$sqlFields .= '`' . $fieldNames[$i] . '` = "' . $fieldValues[$i] . '", ';
			}
			return "UPDATE $dbTable SET " . substr($sqlFields, 0, -2) . " WHERE " . $where;
		break;
	}
}
function Hours( $sl ) {
	$html = '';
	for( $h=0; $h<=23; $h++ ) {
		$h = ( $h <= 9 ) ? '0'.$h : $h;
		$html .= '<option value="'.$h.'" '.sl( $h, $sl ).' >'.$h.'</option>';
	}
	return $html;
}

function Minutes( $sl ) {
	$html = '';
	for( $m=0; $m<=59; $m += 10 ) {
		$m = ( $m <= 9 ) ? '0'.$m : $m;
		$html .= '<option value="'.$m.'" '.sl( $m, $sl ).' >'.$m.'</option>';
	}
	return $html;
}
?>
