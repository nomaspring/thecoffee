<?php

	include 'repository.php';
	include 'workers.php';
 
	$fnsc = $repository."oms1/record/record/scdata/sc.txt";
	$scinlines = file($fnsc);
	$lastsc = end($scinlines);
	$lastscarray = explode(":", $lastsc);
	
	if ($lastscarray[2]!==$dispdate) {
		foreach ($scinlines as $line) {
			$scarray = explode(":", $line);
			if ($scarray[0]==$lastscarray[0] and $scarray[1]==$lastscarray[1] and $scarray[2]==$lastscarray[2]) {
				$amount += number_format($scarray[5]);
			}
		}
		$textforscdaily = "\n{$lastscarray[0]}:{$lastscarray[1]}:{$lastscarray[2]}:{$amount}";

		$fnscdaily = $repository."oms1/record/record/scdata/scdaily.txt";
		$cfscdaily = fopen($fnscdaily, "a");
		fwrite($cfscdaily, $textforscdaily);
		fclose($cfscdaily);
	}

?>