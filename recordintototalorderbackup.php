<?php
	
	include 'repository.php';
	$filePath = $repository."oms1/record/record/billdata/{$_POST['newbillno']}.txt";
	$lines = file($filePath);
	$ordertext = "";
	foreach($lines AS $line) {
		$eachorder = explode(":", $line);
		$ordertext = "{$ordertext}:{$eachorder[1]}:{$eachorder[3]}";
	}

	$ordertext = "\n{$_POST['newbillno']}:{$dispyear}:{$dispmonth}:{$dispdate}:{$disphour}:{$dispminute}:{$_POST['targettable']}{$ordertext}";

	$fndo = $repository."oms1/record/record/total/totalorder.txt";
	$ofro = fopen($fndo, "a");
	fwrite($ofro, $ordertext);
	fclose($ofro);

?>