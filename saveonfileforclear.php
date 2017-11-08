<?php
	$nepaltime=mktime()+(3600*14-(60*15));
	$disptime = date('YmdHi', $nepaltime);

	$ofn = "record/{$_POST['targettable']}.txt";
	$nfn = "record/today/{$disptime}{$_POST['targettable']}.txt";
	copy($ofn, $nfn);
	unlink($ofn);

	include "workers.php";
	$personalsc = array();
	$actualcount = count($_POST['actualworker']);

	$sctextarray = array($disptime);
	$sctext = "";
	foreach ($workers as $worker => $perratio) {
		if (in_array($worker, $_POST['actualworker'])) {
			$personalsc[$worker] = $_POST['sc']/$actualcount*$perratio;
		}	else {
			$personalsc[$worker] = 0;
		}
		$sctextarray[] = $personalsc[$worker];
	}
	$sctext = "\n".implode(":", $sctextarray);

	$fnsc = "record/total/sc.txt";
	$cfsc = fopen($fnsc, "a");
	fwrite($cfsc, $sctext);
	fclose($cfsc);

	header('Location: index.html');
?>

