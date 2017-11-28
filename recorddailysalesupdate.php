<?php

	$fndailysales = "D:/OneDrive/billing/record/total/dailysales.txt";
	$fods = fopen($fndailysales, "a");
	fwrite($fods, $textfordailysales);
	fclose($fods);

?>