<?php
	$nepaltime=mktime()+(3600*13-(60*15));
	$dispyear = date('Y', $nepaltime);
	$dispmonth = date('m', $nepaltime);
	$dispdate = date('d', $nepaltime);
	$disphour = date('H', $nepaltime);
	$dispminute = date('i', $nepaltime);
	$lastyear = date("Y", strtotime("-1 year", $nepaltime));
	$lastmonth = date("m", strtotime("-1 month", $nepaltime));
	$yesterday = date("d", strtotime("-1 day", $nepaltime));
	$mmonth = date('M',$nepaltime);
	
?>