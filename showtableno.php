<?php
include 'repository.php';

$insfiles = scandir($repository."oms1/record/record/");
$instables = str_replace(".txt", "", $insfiles);

$tabletxt = file($repository."oms1/record/initdata/tableno.txt");
$tablearray = array();
foreach ($tabletxt as $value) {
	array_push($tablearray, trim($value));
}

$occupiedtable = array_intersect($tablearray,$instables);

$vacanttable = array_diff($tablearray, $instables);
?>