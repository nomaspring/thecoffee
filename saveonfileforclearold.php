<?php
	include 'repository.php';
	include 'daycount.php';

/*changing filename and moving directory clear bill*/
	$ofn = $repository."oms1/record/record/{$_POST['targettable']}.txt";
	$nfn = $repository."oms1/record/record/billdata/{$_POST['newbillno']}.txt";
	copy($ofn, $nfn);
	unlink($ofn);

/*update and fix yesterday's sales when clearing for today's first bill*/
	$fntotalbill = $repository."oms1/record/record/total/totalbill.txt";
	$billsinlinearr = file($fntotalbill);
	$last = end($billsinlinearr);
	$lastdetail = explode(":", $last);
	if ($lastdetail[3]!==$dispdate) {

// daily summerize in dailysales.txt

		foreach($billsinlinearr AS $case) {
			$billsarr = explode(":", $case);
			if ($billsarr[1]==$lastdetail[1] and $billsarr[2]==$lastdetail[2] and $billsarr[3]==$lastdetail[3]) {
			    $billamount = end($billsarr);
			    $dailyamount += $billamount;
		    }
		    $textfordailysales = "\n{$billsarr[1]}:{$billsarr[2]}:{$billsarr[3]}:{$dailyamount}";
		}
		include 'recorddailysalesupdate.php';
	}

// summarize manually monthly ....

	if ($lastdetail[2]!==$dispmonth) {
		$dailysalesarray = file($repository."oms1/record/record/total/dailysales.txt");
		foreach($dailysalesarray AS $dailyrecord) {
			$dailysales = explode(":", $dailyrecord);
			if ($dailysales[0]==$lastdetail[1] and $dailysales[1]==$lastdetail[2]) {
			    $billamount = end($dailysales);
			    $monthlyamount += $billamount;
		    }
	    	$textformonthlysales = "\n{$dailysales[0]}:{$dailysales[1]}:{$monthlyamount}";
		}
		include 'recordmonthlysalesupdate.php';
	}
	include 'recordintototalbill.php';

/*counting service charge in case and write on sc.txt*/
	$sctext = "\n{$dispyear}:{$dispmonth}:{$dispdate}:{$disphour}:{$dispminute}:{$_POST['sc']}";
	$fnsc = $repository."oms1/record/record/scdata/sc.txt";
	$cfsc = fopen($fnsc, "a");
	fwrite($cfsc, $sctext);
	fclose($cfsc);

/*recording items into totalorder.txt*/
	include 'recordintototalorder.php';

	header('Location: index.html');
?>

