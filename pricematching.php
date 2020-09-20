	<?php
		include 'repository.php';
		$menus = array();
		$filePath = $repository."oms1/record/initdata/menulist.txt";
		$lines = file($filePath);
		foreach($lines AS $line) {
			$menuInfo = explode("\t", trim($line));
			$menus[$menuInfo[1]] = $menuInfo[2];
		}

		function getPrice($menus, $menu) {
		  $price = "";
		  if(count($menus) > 0) {
		     $price = $menus[$menu];
		  }
		  return $price;
		}
   	?>