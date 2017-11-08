<?php
	$filePath = "record/{$_POST['targettable']}.txt";
	$lines = file($filePath);
	$subtotal = 0;
	foreach($lines AS $line) {
	    $eachorder = explode(":", $line);
			echo "<tr>
			<td>".$eachorder[0]."</td>
			<td>".$eachorder[1]."</td>
			<td align=right>".$eachorder[2]."</td>
			<td align=right>".$eachorder[3]."</td>
			<td align=right>".$eachorder[4]."</td>
			</tr>";
			$subtotal = $subtotal+$eachorder[4];
	}
			$sc = $subtotal*0.1;
			$gt = $subtotal+$sc;
?>