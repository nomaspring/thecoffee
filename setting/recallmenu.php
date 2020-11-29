<?php

	include '../repository.php';

	$item = file($repository.'oms1/record/initdata/menulist.txt');

	$eachcat = file($repository.'oms1/record/initdata/catlist.txt');
	$i = 1;
	foreach ($eachcat as $value) {
		$catarray[$i]=$value;
		$i++;
	}

	$menuListArray = array();
	$scfreelist = array();
	foreach ($item as $rawList){
		$arrList = explode("\t", $rawList);
		array_push($menuListArray, $arrList);
		if ($arrList[3] === 'scfree') {
			array_push($scfreelist, $arrList[1]);
		}
	}


	$menuno = 1;
	foreach ($catarray as $catno => $catname) {
		echo "
		<fieldset id=\"{$catname}\"><legend>{$catname}</legend>";
        echo '<div class="gridtable" style="display: none;">
                    <div>menu</div>
                    <div>price</div>
                    <div>s/c free</div>
                    <div>show</div>
                </div>';
		foreach ($item as $line) {
			$itemdetail = explode("\t", trim($line));
			if ($itemdetail[0]==$catno) {
				echo '<div class="itemdetail '.$catname.' gridtable" style="display: none;">
				<input type="hidden" value="'.$catname.'" name="'.$menuno.'[category]">
				<input type="text" value="'.$itemdetail[1].'" name="'.$menuno.'[name]">
				<input type="number" value="'.intval($itemdetail[2]).'" name="'.$menuno.'[price]">';
				if (in_array($itemdetail[1], $scfreearray)) {
					echo '<input type="checkbox" value="scfree" name="'.$menuno.'[scfree]" checked="checked">';
				} else {
					echo '<input type="checkbox" value="scfree" name="'.$menuno.'[scfree]">';
				}
				if (in_array('show', $itemdetail)) {
					echo '<input type="checkbox" value="show" name="'.$menuno.'[show]" checked="checked">';
				} else {
					echo '<input type="checkbox" value="show" name="'.$menuno.'[show]">';
				}


				echo '</div>';
				$menuno++;
			}
		}

		echo '<button type="button" class="additem" style="display: none;">add item <i class="icon-plus-circled"></i></button>';
		echo '</fieldset>';
	}


?>