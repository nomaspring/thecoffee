<?php
	include 'repository.php';
	$fn = $repository."oms1/record/record/{$_POST['ordertable']}.txt";
	$ft = $_POST['savetext'];
	$cf = fopen($fn, "w");
	fwrite($cf, $ft);
	fclose($cf);

	header('Location: index.php');
?>

