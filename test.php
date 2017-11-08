<?php

	include "workers.php";
	$personalsc = array();
	$actualcount = count($_POST['actualworker']);

	foreach ($workers as $worker => $perratio) {
		if (in_array($worker, $_POST['actualworker'])) {
			$personalsc[$worker] = $_POST['sc']/$actualcount*$perratio;
		}	else {
			$personalsc[$worker] = 0;
		}
	}

	// for($c=0; $c<$actualcount; $c++){


	// 	$wname = $_POST['actualworker'][$c];

	// 	$personalratio = getratio($workers, $wname);
	// 	$personalamount = $_POST['sc']/$actualcount*$personalratio;
	// 	$personalsc[$wname] = $personalamount;
	// }


foreach ($personalsc as $key => $value) {
	echo $key." has ".$value."<br/>";
}



 ?>
