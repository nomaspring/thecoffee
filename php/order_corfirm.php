	<hr/>
	<table>
		<thead style="background-color:grey">
		<tr>
		  <td>no</td>
		  <td>item</td>
		  <td>price</td>
		  <td>q'ty</td>
		  <td>amount</td>
		</tr>
		</thead>
		<tbody>
			<?php
				$akey = array_keys($_POST);
				$avalue = array_values($_POST);
				for($c=1; $c<=$realitemc; $c++){
					echo "<tr><td>{$c}</td><td>{$akey[$c]}</td><td align=right>not yet</td><td align=right>{$avalue[$c]}</td><td align=right>wait more</td></td>";
				};
			?>
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td colspan="2">subtotal</td>
				<td colspan="2" align=right>later</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">service charge</td>
				<td colspan="2" align=right>later</td>
			</tr>
			<tr style="background-color:grey">
				<td colspan="2">grand total</td>
				<td colspan="3" align=right style = " font-size:1.5em">later</td>
			</tr>
		</tfoot>
	</table>
	<hr/>