<?php 
	$workers = array();
	$filePath = "initdata/employee.txt";
	$worker = file($filePath);
	foreach($worker AS $workername) {
		$scratio = explode(":", trim($workername));
		if (!isset($scratio[3])) {
			$workers[$scratio[0]] = $scratio[1];
		}
	}
 
	function getratio($workers, $worker) {
	  $ratio = "";
	  if(count($workers) > 0) {
	     $ratio = $workers[$worker];
	  }
	  return $ratio;
	}

 ?>