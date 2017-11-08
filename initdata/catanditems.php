	<?php

		$catanditems = array();
		$filePath = "initdata/menulist.txt";
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

		foreach($lines AS $line) {
			$menuinfo = explode("\t", $line);
			$catv = $menuinfo[0];
			array_push($catanditems[$catv], $menuinfo[1]);
		}

   	?>


