<?php
	$categoryListFromTextFile = file($repository."oms1/record/initdata/catlist.txt");
	$i = 1;
	foreach ($categoryListFromTextFile as $optionInLine){
		echo '<option value="'.$i.'">'.$optionInLine.'</option>';
	 $i++;

	}
?>