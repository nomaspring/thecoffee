<html>
	
	closing daily sales
	<hr/>

	<?php
		include '../repository.php';

		$closing = $_POST;
		$fnclosing = $repository.'oms1/record/record/total/closing.txt';
		$closingcontents = file($fnclosing);
		$todaysales = array_pop($closingcontents);
		$closingtime = array_shift($closingcontents);
		echo "closing time : ".$closingtime."<br/>";
		echo "today's sales : ".number_format($todaysales)." rps";
	?>
	<hr>
	changes : 

	<table>
		<tr>
			<td>bill</td>
			<td>currency</td>
			<td>q'ty</td>
			<td>amount</td>
		</tr>

		<?php
			foreach ($closingcontents as $key => $value) {
				$data = explode(":", $value);
				echo "<tr><td>".$data[0]."</td><td>".$data[1]."</td><td><b>".$data[2]."</b></td><td>".number_format($data[3])."</td></tr>";
				$total += $data[3];
			}
		?>

		<tr>
			<td colspan="3">sum</td>
			<td align='left'><?php echo number_format($total); ?></td>
		</tr>
		<tr>
			<td colspan="3">reserved</td>
			<td align='left'>4,000</td>
		</tr>
		<tr>
			<td colspan="3">balance</td>
			<td align='left'><?php echo number_format($total-$todaysales-4000); ?></td>
		</tr>
	</table>
 	<hr>
	<div class="btnbox">
		<input type="button" class="sbtn btnno" value="OK" onclick="location.href='../index.php'">
	</div>

</html>
