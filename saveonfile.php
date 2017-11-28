<?php
	$fn = "D:/OneDrive/billing/record/{$_POST['ordertable']}.txt";
	$ft = $_POST['savetext'];
	$cf = fopen($fn, "w");
	fwrite($cf, $ft);
	fclose($cf);

	header('Location: index.html');
?>

