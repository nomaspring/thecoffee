<?php

	$fndailysales = "D:/OneDrive/billing/record/total/monthlysales.txt";
	$fods = fopen($fndailysales, "a");
	fwrite($fods, $textformonlysales);
	fclose($fods);

?>