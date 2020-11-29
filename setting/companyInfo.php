<?php
include '../repository.php';
$madeInfo = $_POST;

$companyInfo = '';
foreach ($madeInfo as $key => $value) {
	$companyInfo = $companyInfo.$key.'|'.$value."\n";
}

$fn = $repository.'oms1/record/initdata/companyInfo.txt';
$companyFile = fopen($fn, "w");
fwrite($companyFile, $companyInfo);
fclose($companyFile);

header('Location: indexForPreference.php');

?>