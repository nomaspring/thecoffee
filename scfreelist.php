<?php
		include 'repository.php';
		$menusscfree = array();
		$filePath = $repository."oms1/record/initdata/scfreelist.txt";
		$lines = file($filePath);
		foreach($lines AS $line) {
			$menuInfo = explode("\t", trim($line));
			$menusscfree[] = $menuInfo[1];
		}
?>