<?php

	$fnto = "d:/onedrive/billing/record/total/totalorder.txt";
	$ordersinlinearr = file($fnto);

	$iteminteg = [];
	foreach($ordersinlinearr AS $case) {
		$eachorders = explode(":", $case);
		if ($eachorders[1]==$dispyear and $eachorders[2]==$dispmonth and $eachorders[3]==$dispdate) {
			$onlyorders = array_splice($eachorders, 7);
			$itemcount = [];
			for ($i=0;$i<count($onlyorders);$i=$i+2) {
				$itemcount[$onlyorders[0+$i]] = intval($onlyorders[1+$i]);
			}
			foreach ($itemcount as $item => $count) {
				if (isset($iteminteg[$item])) {
					$iteminteg[$item]+=$count;
				} else {
					$iteminteg[$item] = $count; 
				}
			}
		}
	}
	echo "<table><tr><td>item</td><td>qty</td></tr>";
	foreach ($iteminteg as $item => $count) {
		echo "<tr><td>{$item}</td><td>{$count}</td></tr>";
	}
	echo "</table>";
?>