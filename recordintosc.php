<?php
	include "initdata/workers.php";
	$personalsc = array();
	$actualcount = count($_POST['actualworker']);

	$sctextarray = array($dispyear, $dispmonth, $dispdate, $disphour, $dispminute, $_POST['sc']);
	$sctext = "";
	foreach ($workers as $worker => $perratio) {
		if (in_array($worker, $_POST['actualworker'])) {
			$personalsc[$worker] = $_POST['sc']/$actualcount*$perratio;
		}	else {
			$personalsc[$worker] = 0;
		}
		$sctextarray[] = intval($personalsc[$worker]);
	}
	$sctext = "\n".implode(":", $sctextarray);

	$fnsc = "D:/OneDrive/billing/record/scdata/sc.txt";
	$cfsc = fopen($fnsc, "a");
	fwrite($cfsc, $sctext);
	fclose($cfsc);
?> 