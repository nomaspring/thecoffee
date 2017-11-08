<!DOCTYPE html>
<html>

	<?php
		$nepaltime=mktime()+(3600*14-(60*15));
		$disptime = date('YmdHi', $nepaltime); 
	 ?>

	<div id="billhead">
		<h3>Detailed Statement</h3>
		<pre>
gaurighat, lakeside, pokhara, kaski, nepal
PAN no : 304227178
bill no : xxxxxxxxx  | <?php echo json_encode($disptime); ?>
		</pre>
	</div>

	<hr/>
	table no : <?php echo $_POST['targettable'];?>

	<div>
        <table border-style="ridge" width="400">
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
	              include 'orderrecallforclear.php';
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
	</div>
	<hr/>

	<input type="button" value="Cancel" onclick="location.href='index.html'">

	<input type="button" value="Print" onclick="window.print()">

	<form action="scnclear.php" method="POST" style="display: inline-block;">
		<input type="hidden" name="targettable" value="<?php echo $_POST['targettable']; ?>">
		<input type="hidden" name="sc" value="<?php echo json_encode($sc); ?>">
		<input type="submit" value="Clear">
	</form>


</html>

