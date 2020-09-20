<?php

	include 'repository.php';
	$dailysalesarray = file($repository."oms1/record/record/total/dailysales.txt");
	foreach($dailysalesarray AS $dailyrecord) {
		$dailysales = explode(":", $dailyrecord);
		if ($dailysales[0]=='2017' and $dailysales[1]=='11') {
		    $billamount = end($dailysales);
		    $monthlyamount += $billamount;
	    }
	}

	$textformonthlysales = "\n2017:11:{$monthlyamount}";
		
	echo $textformonthlysales ;

	// $fndailysales = "c:/users/intel/dropbox/oms1/record/record/total/monthlysales.txt";
	// $fods = fopen($fndailysales, "a");
	// fwrite($fods, $textformonlysales);
	// fclose($fods);

?>