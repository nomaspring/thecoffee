<?php

	include 'repository.php';
	$fndailysales = $repository."oms1/record/record/total/monthlysales.txt";
	$fods = fopen($fndailysales, "a");
	fwrite($fods, $textformonthlysales);
	fclose($fods);

?>