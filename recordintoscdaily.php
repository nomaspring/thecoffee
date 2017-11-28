<?php

	$filePath = "initdata/employee.txt";
	$worker = file($filePath);
	foreach($worker AS $workername) {
		$personinfo = explode(":", $workername);
		if (!isset($personinfo[3])) {
			$workers[] = $personinfo[0];
		}
	}

	$fnsc = "D:/OneDrive/billing/record/scdata/sc.txt";
	$scinlines = file($fnsc);
	$lastsc = end($scinlines);
	$lastscarray = explode(":", $lastsc);
	
	if ($lastscarray[2]!==$dispdate) {
		$i = 0;
		foreach ($workers as $name) {
			foreach ($scinlines as $line) {
				$scarray = explode(":", $line);
				if ($scarray[0]==$lastscarray[0] and $scarray[1]==$lastscarray[1] and $scarray[2]==$lastscarray[2]) {
					$amount += $scarray[6+$i];
				}
			}
			$dailyscarray[] = intval($amount);
			$sctotal += intval($amount);
			$i = $i+1;
			$amount = 0;
		}
	}
	$textsconly = implode(":", $dailyscarray);
	$textforscdaily = "\n{$scarray[0]}:{$scarray[1]}:{$scarray[2]}:{$sctotal}:{$textsconly}";

	$fnscdaily = "D:/OneDrive/billing/record/scdata/scdaily.txt";
	$cfscdaily = fopen($fnscdaily, "a");
	fwrite($cfscdaily, $textforscdaily);
	fclose($cfscdaily);

?>