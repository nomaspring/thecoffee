<?php

include "../repository.php";

$serialdata = $_POST;

$menulist = $repository."oms1/record/initdata/menulist.txt";
$updatemenu = fopen($menulist, "w+");

$scfreelist = $repository."oms1/record/initdata/scfreelist.txt";
$updatescfree = fopen($scfreelist, "w+");


$catline = file($repository.'oms1/record/initdata/rawcatlist.txt');
foreach ($catline as $value) {
	$catarr = explode("\t", trim($value));
	$catarray[$catarr[0]]=$catarr[1];
}

foreach ($serialdata as $no => $line) {
	array_splice($line, 0, 1, array_search($line["category"], $catarray));

	$menudetail = implode("\t", $line);
	if (isset($line["scfree"])) {
		fwrite($updatescfree, $menudetail."\n");
	}


	fwrite($updatemenu, $menudetail."\n");
}

fclose($updatemenu);
fclose($updatescfree);
header("Location: indexForPreference.php");

?>
