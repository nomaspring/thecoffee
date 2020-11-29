	<?php

		include 'repository.php';
		
		$catanditems = array();
		$filePath = $repository."oms1/record/initdata/menulist.txt";
		$lines = file($filePath);

		$catanditems['1']=array();
		$catanditems['2']=array();
		$catanditems['3']=array();
		$catanditems['4']=array();
		$catanditems['5']=array();
		$catanditems['6']=array();
		$catanditems['7']=array();
		$catanditems['8']=array();
		$catanditems['9']=array();
		$catanditems['10']=array();
		$catanditems['11']=array();
		$catanditems['12']=array();

		foreach($lines AS $line) {
			$menuinfo = explode("\t", trim($line));
			if (in_array("show", $menuinfo)) {
				$catv = $menuinfo[0];
				array_push($catanditems[$catv], $menuinfo[1]);
			}
		}
   	?>

<!-- 1	espresso	150	show -->


