<?php

include '../repository.php';

$result = array_chunk($_POST,4);

$efile = fopen($repository."oms1/record/initdata/employee.txt", "w");
foreach ($result as $key => $value) {
	$dataArr = [];
	foreach ($value as $turn => $data) {
		$dataArr[] = $data;
	}
	$dataText = implode(":", $dataArr);
	fwrite($efile, $dataText."\n");
}
fclose($efile);

header('Location: indexForPreference.php');

?>