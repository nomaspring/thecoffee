<?php
	include 'repository.php';
	$salestext = "\n{$_POST['newbillno']}:{$dispyear}:{$dispmonth}:{$dispdate}:{$disphour}:{$dispminute}:{$_POST['targettable']}:{$_POST['cleargt']}";

	$fntotalbill = $repository."oms1/record/record/total/totalbill.txt";
	$fotbfora = fopen($fntotalbill, "a");
	fwrite($fotbfora, $salestext);
	fclose($fotbfora);
?>