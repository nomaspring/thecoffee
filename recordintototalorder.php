<?php

	include 'repository.php';
	$menulist = file($repository.'oms1/record/initdata/menulist.txt');
	foreach ($menulist as $line) {
		$linearray = explode("\t", $line);
		if($linearray[0] == '7') {
			$winelist[] = $linearray[1];
		}
	}

	$filePath = $repository."oms1/record/record/billdata/{$_POST['newbillno']}.txt";
	$lines = file($filePath);
	$ordertext = "";
	
	foreach($lines AS $line) {
		$eachorder = explode(":", $line);
		$ordertext = "{$ordertext}:{$eachorder[1]}:{$eachorder[3]}";

// get wine sold data to array
		if (in_array($eachorder[1], $winelist)) {
			$winesell[$eachorder[1]] = $eachorder[3];
		}
	}

	$ordertext = "\n{$_POST['newbillno']}:{$dispyear}:{$dispmonth}:{$dispdate}:{$disphour}:{$dispminute}:{$_POST['targettable']}{$ordertext}";

	$fndo = $repository."oms1/record/record/total/totalorder.txt";
	$ofro = fopen($fndo, "a");
	fwrite($ofro, $ordertext);
	fclose($ofro);

// revise wine.txt
	if (!empty($winesell)) {

		$winefilelocation = $repository.'oms1/record/record/wine/';

		include $winefilelocation.'winestock.php';

		$newwinestock = $winestock;
		foreach ($winesell as $wname => $wbottle) {
			if (isset($newwinestock[str_replace(" glass","",$wname)])) {
				$newwinestock[str_replace(" glass","",$wname)]-=($wbottle/4);
			}/* else {
				$newwinestock[$wname] = $wbottle; 
			}*/
			if (isset($newwinestock[str_replace(" bottle","",$wname)])) {
				$newwinestock[str_replace(" bottle","",$wname)]-=$wbottle;
			}
		}

		include $winefilelocation.'savenewstock.php';
	}
	
?>
