<!DOCTYPE html>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta charset="utf-8">
	    <title>cafe The Coffee Order Management System</title>
    	<link rel="stylesheet" href="fontello-63cbc188/css/fontello.css">
	    <link rel="stylesheet" href="oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
	</head>
	<body style="font-size: 0.7em">
		<?php
			include 'repository.php';
			$nepaltime=mktime()+(3600*14-(60*15));
			$disptime = date('d M Y, H:i', $nepaltime);
			$recdate = date('Ymd', $nepaltime);
			$rectime = date('Hi', $nepaltime);

			$fnst = $repository."oms1/record/record/total/totalbill.txt";
			$cfst = fopen($fnst, "r");
			$saleslinearr = file($fnst);
			$saleslastline = end($saleslinearr);
			$lastbillnoarr = explode(":", $saleslastline);
			$billno = $lastbillnoarr[0];
			$newbillno = $billno+1;
			fclose($cfst);

			$tableno = $_POST['targettable'];
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
				<button type="button" class="sbtn btnno" onclick="location.href='index.html'">Home <i class="icon-home"></i></button>
				<button type="button" class="sbtn btncontinue" onclick="window.print()">Print <i class="icon-print"></i></button>

				<form action="saveonfileforclear.php" method="POST" style="display: inline-block;">
					<input type="hidden" name="newbillno" value="<?php echo $newbillno; ?>">
					<input type="hidden" name="cleargt" value="<?php echo $gt; ?>">
					<input type="hidden" name="targettable" value="<?php echo $tableno; ?>">
					<input type="hidden" name="sc" value="<?php echo json_encode($sc); ?>">
					<button type="submit" class="sbtn btnok">Clear <i class="icon-export-alt"></i></button>
				</form>
			</div>
		</article>
		<footer>
			<i>Thank you!! Have a wonderful day!!</i><br/>
			<H2>The Coffee</H2>
			"A very special place for Cakes and The Coffee"<br/>
			www.facebook.com/thecoffeenepal

			<div class="btnbox">
				<div class="center">
					<div id="TA_excellent826" class="TA_excellent">
					<ul id="eXRWkwG0VSdI" class="TA_links xYvNkahpG">
					<li id="LmtLJtcUUpW" class="VJS3v7QdgVE">
					<a target="_blank" href="http://www.tripadvisor.com/"><img src="http://static.tacdn.com/img2/widget/tripadvisor_logo_115x18.gif" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a>
					</li>
					</ul>
					</div>
					<script src="http://www.jscache.com/wejs?wtype=excellent&amp;uniq=826&amp;locationId=7679566&amp;lang=en_US&amp;display_version=2"></script>
				</div>
			</div>
		</footer>
	</body>
</html>

