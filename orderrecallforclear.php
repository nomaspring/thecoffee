<?php
	include 'repository.php';
	include 'scfreelist.php';
	$insfreescamount = 0;

	$filePath = $repository.'oms1/record/record/'.$tableno.'.txt';
	$lines = file($filePath);
	$subtotal = 0;
	foreach($lines AS $line) {
	    $eachorder = explode(":", $line);
		echo "<tr>
		<td>".$eachorder[0]."</td>
		<td>".$eachorder[1]."</td>
		<td align=right>".$eachorder[2]."</td>
		<td align=right>".$eachorder[3]."</td>
		<td align=right>".number_format($eachorder[4])."</td>
		</tr>";
		$subtotal = $subtotal+$eachorder[4];
		if(in_array($eachorder[1], $menusscfree)) {
			$insfreescamount = $insfreescamount+$eachorder[4];
		}
	}
	$sc = ($subtotal-$insfreescamount)*0.1;
	$gt = $subtotal+$sc;
?>