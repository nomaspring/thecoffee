<!DOCTYPE html>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta charset="utf-8">
	    <title>cafe The Coffee Order Management System</title>
	    <link rel="stylesheet" href="oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
	</head>
	<body style="font-size: 0.7em">
		<?php
			$nepaltime=mktime()+(3600*14-(60*15));
			$disptime = date('d M Y, H:i', $nepaltime);
			$recdate = date('Ymd', $nepaltime);
			$rectime = date('Hi', $nepaltime);

			$fnst = "d:/onedrive/billing/record/total/totalbill.txt";
			$cfst = fopen($fnst, "r");
			$saleslinearr = file($fnst);
			$saleslastline = end($saleslinearr);
			$lastbillnoarr = explode(":", $saleslastline);
			$billno = $lastbillnoarr[0];
			$newbillno = $billno+1;
			fclose($cfst);
		 ?>

		<div id="billhead">
			<h3 style="text-align: center">Receipt</h3>
			The Coffee Pvt. Ltd.<br/>
			gaurighat, lakeside, pokhara, kaski, nepal<br/>
			PAN no : 304227178<br/>
			<?php
				echo "bill no : ".$newbillno."<br/>";
				echo "bill time : ".$disptime; 
			?>
		</div>

		<hr/>
		<article>
			<p style="text-align: center">Detailed Statement</p>
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
			<div class="btnbox">
				<input type="button" class="sbtn btnno" value="Cancel" onclick="location.href='index.html'">
				<input type="button" class="sbtn btncontinue" value="Print" onclick="window.print()">
				<form action="scnclear.php" method="POST" style="display: inline-block;">
					<input type="hidden" name="newbillno" value="<?php echo $newbillno; ?>">
					<input type="hidden" name="cleargt" value="<?php echo $gt; ?>">
					<input type="hidden" name="targettable" value="<?php echo $_POST['targettable']; ?>">
					<input type="hidden" name="sc" value="<?php echo json_encode($sc); ?>">
					<input type="submit" class="sbtn btnok" value="Clear">
				</form>
			</div>
		</article>
		<footer>
			<i>Thank you!! Have a wonderful day!!</i><br/>
			<Br/>
			<H3>The Coffee</H3>
			A very special place for Cakes and The Coffee<br/>
			www.facebook.com/thecoffeenepal
		</footer>
	</body>
</html>

