<?php
$fotterLinks = "<ul>
		        	<li><a href='".callPageHref('17')."'>Objective</a></li>
		        	<li><a href='post.php?type=blogs'>Learning</a></li>
		            <li><a href='".callPageHref('8')."'>Team</a></li>
		            <li><a href='".callPageHref('10')."'>Employment With Us</a></li>
		        </ul>";

$tpl->assign('FOOTERLINKS',$fotterLinks);

$curYear = date('Y');
$tpl->assign('CURYEAR',$curYear);
$tpl->assign('HEADERIMAGE',$headerImage);
$tpl->assign('HEADER_HEADING',$heading);
$tpl->assign('HEADER_HEADING2',$heading2);
$tpl->assign('PAGE_CONTENT',$content);
$tpl->assign('METATITLE',$metaTitle);
$tpl->assign('METAKEYWORDS',$metaKeywords);
$tpl->assign('METADESCRIPTION',$metaDescription);

$tpl->parse("HEADER","header");
$tpl->parse("SIDEBAR","sidebar");
$tpl->parse("FOOTER","footer");
$tpl->parse("CONTENT","content");
$tpl->parse("MAIN","main");

$tpl->FastPrint();
?>
