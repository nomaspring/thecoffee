<?php

	include 'repository.php';
	$fndailysales = $repository."oms1/record/record/total/dailysales.txt";
	$fods = fopen($fndailysales, "a");
	fwrite($fods, $textfordailysales);
	fclose($fods);

?>