<?php
	$fnds = "d:/onedrive/billing/record/total/olddata/transit.txt";
	$salesinlinearr = file($fnds);

	$fnop = "d:/onedrive/billing/record/total/olddata/oldmonthlydataproc.txt";
	$fp = fopen($fnop, "a+");

	foreach($salesinlinearr AS $case) {
		$dailysales = explode(":", $case);
		$cyear = $dailysales[0];
		$cmonth = $dailysales[1];
		$monthlyamount += end($dailysales);
	}
	$newstr = "\n".$cyear.":".$cmonth.":".$monthlyamount;
	fwrite($fp, $newstr);
	echo $cyear.":".$cmonth.":"." recorded";
	fclose($fp);
?>