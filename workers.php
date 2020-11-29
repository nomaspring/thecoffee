<?php 
	include 'repository.php';

	$workers = array();
	$filePath = $repository."oms1/record/initdata/employee.txt";
	$worker = file($filePath);
	foreach($worker AS $workername) {
		$scratio = explode(":", trim($workername));
		if ($scratio[3]=="") {
			$workers[$scratio[0]] = $scratio[1];
		}
	}
	$totalhead = array_sum($workers);


	function getratio($workers, $worker) {
	  $ratio = "";
	  if(count($workers) > 0) {
	     $ratio = $workers[$worker];
	  }
	  return $ratio;
	}
 ?>