<?php

include 'repository.php';

$raw = $_POST;
$trans = [];
foreach ($raw as $key => $value) {
	array_push($trans,$value);
}

$efile = fopen($repository."oms1/record/initdata/employee.txt", "w");
$result = array_chunk($trans,4);
foreach ($result as $key => $value) {
	$fvalue = array_filter($value);
	fwrite($efile, implode(":", $fvalue));
	fwrite($efile, "\n");
}
fclose($efile);

header('Location: employee_manage.php');

?>