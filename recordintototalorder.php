<?php
	$filePath = "D:/OneDrive/billing/record/billdata/{$_POST['newbillno']}.txt";
	$lines = file($filePath);
	$ordertext = "";
	foreach($lines AS $line) {
		$eachorder = explode(":", $line);
		$ordertext = "{$ordertext}:{$eachorder[1]}:{$eachorder[3]}";
	}

	$ordertext = "\n{$_POST['newbillno']}:{$dispyear}:{$dispmonth}:{$dispdate}:{$disphour}:{$dispminute}:{$_POST['targettable']}{$ordertext}";

	$fndo = "D:/OneDrive/billing/record/total/totalorder.txt";
	$ofro = fopen($fndo, "a");
	fwrite($ofro, $ordertext);
	fclose($ofro);
?>