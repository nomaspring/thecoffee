<?php
		$menusscfree = array();
		$filePath = "initdata/scfreelist.txt";
		$lines = file($filePath);
		foreach($lines AS $line) {
			$menuInfo = explode("\t", trim($line));
			$menusscfree[] = $menuInfo[1];
		}
?>