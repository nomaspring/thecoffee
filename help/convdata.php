<?php
	$fnds = "d:/onedrive/billing/record/total/olddata.txt";
	$oldtext = file_get_contents($fnds);
	$ptext = str_replace("\t", ":", $oldtext);
	$fnim = "d:/onedrive/billing/record/total/olddataproc.txt";
	$fp = fopen($fnim, "a+");
	fwrite($fp, $ptext);
	fclose($fp);
?>