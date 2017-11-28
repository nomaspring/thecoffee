<?php
$nepaltime=mktime()+(3600*14-(60*15));
echo "yesterday : ".date("Y-m-d, H:i",strtotime("-1 day", $nepaltime))."<br/>";
echo "today : ".date("Y-m-d, H:i",strtotime("now", $nepaltime))."<br/>";
echo "today 2hrs after : ".date("Y-m-d, H:i",strtotime("+2 hours", $nepaltime))."<br/>";
echo "<br/>";


	$fnds = "d:/onedrive/billing/record/total/dailysales.txt";
	$salesinlinearr = file($fnds);
	$targetarr = [];
	foreach($salesinlinearr AS $case) {
		$dailysales = explode(":", $case);
		$yrmon = $dailysales[0].$dailysales[1];
		if (201612 <= intval($yrmon) and intval($yrmon) <= 201701) {
		    $dailyamount = end($dailysales);
		    if ($dailysales[1] = prev($dailysales)[1]) {
		    	$monthlyamount += $dailyamount;
				$targetarr[$yrmon] = $monthlyamount;
		    } else {
		    	$monthlyamount = $dailyamount;
		    }
		}
	}

	// foreach ($targetarr as $key => $value) {
	// 	$currentyear = $value[0];
	// 	$currentmon = $value[1];
	// 	while ($currentyear == $value[0] and $currentyear = $value[1]) {
	// 		$dailyamount = end($value);
	// 		$monthlyamount += $dailyamount;.
	// 	}
		
	// }


	// foreach ($targetarr as $value) {
	// 	$dailyamount = end($value);
	// 	$monthlyamount += $dailyamount;.
	// }

	// 	$dailyamount = end($dailysales);
	// 	    $monthlyamount += $dailyamount;
		var_dump($targetarr);
	

?>