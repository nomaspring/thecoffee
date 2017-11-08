<table>
	<thead style="background-color:burlywood">
	<tr>
	  <td>no</td>
	  <td>item</td>
	  <td align=right>price</td>
	  <td align=right>q'ty</td>
	  <td align=right>amount</td>
	</tr>
	</thead>
	<tbody>
		<?php
			$akey = array_keys($_POST);
			$avalue = array_values($_POST);
			$bakey = str_replace("_", " ", $akey);
			$bavalue = str_replace("_", " ", $avalue);
			$subtotal = 0;
			$ordertext = "";
			for($c=2; $c<$itemcount; $c++){
				$n=$c-1;
				$insprice = getPrice($menus, $bakey[$c]);
				$insamount = $insprice*$bavalue[$c];
				echo "<tr><td>{$n}</td><td>{$bakey[$c]}</td><td align=right>{$insprice}</td><td align=right>{$bavalue[$c]}</td><td align=right>".number_format($insamount)."</td></td>";
				$subtotal = $subtotal+$insamount;
				$ordertext = $ordertext.$n.":".$bakey[$c].":".$insprice.":".$bavalue[$c].":".$insamount."\n";
			};
			$sc = $subtotal*0.1;
			$gt = $subtotal+$sc;
		?>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td colspan="2">subtotal</td>
			<td colspan="2" align=right><?php echo number_format($subtotal); ?></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2">service charge</td>
			<td colspan="2" align=right><?php echo number_format($sc); ?></td>
		</tr>
		<tr style="background-color:burlywood">
			<td colspan="2">grand total</td>
			<td colspan="3" align=right style = " font-size:1.5em"><?php echo number_format($gt); ?></td>
		</tr>
	</tfoot>
</table>
