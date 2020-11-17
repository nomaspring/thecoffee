<?php
	include '../repository.php';
	$newTableList = $_POST['allTable'];

	$filename = $repository.'oms1/record/initdata/tableno.txt';
	$pf = fopen($filename, "w");
	fwrite($pf, $newTableList);
	fclose($pf);

	header('Location: indexForPreference.php');

?>