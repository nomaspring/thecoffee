<?php
	$nepaltime=mktime()+(3600*14-(60*15));
	$dispyear = date('Y', $nepaltime);
	$dispmonth = date('m', $nepaltime);
	$dispdate = date('d', $nepaltime);
	$disphour = date('H', $nepaltime);
	$dispminute = date('i', $nepaltime);

/*changing filename and moving directory clear bill*/
	$ofn = "D:/OneDrive/billing/record/{$_POST['targettable']}.txt";
	$nfn = "D:/OneDrive/billing/record/billdata/{$_POST['newbillno']}.txt";
	copy($ofn, $nfn);
	unlink($ofn);

/*update and fix yesterday's sales when clearing for today's first bill*/
	$fntotalbill = "D:/OneDrive/billing/record/total/totalbill.txt";
	$billsinlinearr = file($fntotalbill);
	$last = end($billsinlinearr);
	$lastdetail = explode(":", $last);
	if ($lastdetail[3]!==$dispdate) {
 
// addition.. probably summarize manually monthly
 		if ($lastdetail[2]!==$dispmonth) {
 			foreach($billsinlinearr AS $case) {
				$billsarr = explode(":", $case);
				if ($billsarr[1]==$lastdetail[1] and $billsarr[2]==$lastdetail[2]) {
				    $billamount = end($billsarr);
				    $monthlyamount += $billamount;
			    }
			    $textformonthlysales = "\n{$billsarr[1]}:{$billsarr[2]}:{$monthlyamount}";
			}
			include 'recordmonthlysalesupdate.php';
 		}
// upto here for monthly

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
	include 'recordintototalbill.php';


/*update and fix yesterday's sc when clearing for today's first bill*/
	include 'recordintoscdaily.php';

/*counting service charge in case and write on sc.txt*/
	include 'recordintosc.php';


/*recording items into totalorder.txt*/
	include 'recordintototalorder.php';

	header('Location: index.html');
?>

