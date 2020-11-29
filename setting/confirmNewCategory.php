<?php
	include '../repository.php';
	$newCategoryList = $_POST['allCategory'];

	$filename = $repository.'oms1/record/initdata/catlist.txt';
	$pf = fopen($filename, "w");
	fwrite($pf, $newCategoryList);
	fclose($pf);

	header('Location: indexForPreference.php');

?>