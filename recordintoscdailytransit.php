<?php

	include 'repository.php';
	$filePath = $repository."oms1/record/initdata/employee.txt";
	$worker = file($filePath);
	foreach($worker AS $workername) {
		$personinfo = explode(":", $workername);
		if (!isset($personinfo[3])) {
			$workers[] = $personinfo[0];
		}
	}

	$fnsc = $repository."oms1/record/record/scdata/sc.txt";
	$scinlines = file($fnsc);
	$lastsc = end($scinlines);
	$lastscarray = explode(":", $lastsc);
	

	$i = 0;
	foreach ($workers as $name) {
		foreach ($scinlines as $line) {
			$scarray = explode(":", $line);
			if ($scarray[0]==$lastscarray[0] and $scarray[1]==$lastscarray[1] and $scarray[2]==26) {
				$amount += $scarray[6+$i];
				$cyear = $scarray[0];
				$cmonth = $scarray[1];
				$cdate = $scarray[2];
			}
		}
		$workerssc[$name] = intval($amount);
		$sctotal += intval($amount);
		$i = $i+1;
		$amount = 0;
		$dailyscarray[] = $workerssc[$name];
	}
	$textsconly = implode(":", $dailyscarray);
	$textforscdaily = "\n{$cyear}:{$cmonth}:{$cdate}:{$sctotal}:{$textsconly}";
	$fnscdaily = $repository."oms1/record/record/scdata/scdaily.txt";
	$cfscdaily = fopen($fnscdaily, "a");
	fwrite($cfscdaily, $textforscdaily);
	fclose($cfscdaily);

echo $textforscdaily." done";
?>