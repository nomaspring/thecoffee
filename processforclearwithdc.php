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
         include 'setting/promo_info.php';
			include 'daycount.php';

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
			lakeside 8th st., gaurighat, pokhara, kaski<br/>
			PAN no : 304227178<br/>
			
			<?php
			echo "bill no : ".$newbillno."<br/>";
			echo "bill time : ".$disptime;
			?>
		</div>

		<hr/>
		<article>
			<p style="text-align: center">Detailed Statement</p>
			table no : <span style = " font-size:1.5em;  color: purple;"><?php echo $tableno;?></span>
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
					<tr style="background-color:burlywood; font-size:1.5em">
						<td colspan="2">grand total</td>
						<td colspan="3" align=right><?php echo number_format($gt); ?></td>
					</tr>

<!-- working only on promotion  -->									<?php
						if (isset($dcrate)) {
							$dc = intval(-$gt*$dcrate);
							$sc = 0;
							$gt = $gt+$dc;
							echo '<tr style = " font-size:2em">
								<td colspan="2">'.$promorate.' off by '.$promotitle.'</td>
								<td colspan="3" align=right>'.$dc.'</td>
							</tr>';
							echo '<tr style="background-color:burlywood; font-size:1.5em">
								<td colspan="2">actual amount</td>
								<td colspan="3" align=right>'.number_format($gt).'</td>
							</tr>';
						}
					?>
<!-- -------------------------->

 	        </table>
			</div>
			<hr/>
			<div class="btnbox">
				<button type="button" class="sbtn btnno" onclick="location.href='index.php'">Home <i class="icon-home"></i></button>
				<form action="orderedit.php" method="POST" style="display: inline-block;">
					<button class="sbtn btnedit" name="targettable" value="<?php echo $tableno; ?>">Edit <i class="icon-arrows-cw"></i></button>
				</form>
				<button type="button" class="sbtn btncontinue" onclick="window.print()">Print <i class="icon-print"></i></button>

				<form action="saveonfileforclear.php" method="POST" style="display: inline-block;">
					<input type="hidden" name="newbillno" value="<?php echo $newbillno; ?>">
					<input type="hidden" name="cleargt" value="<?php echo $gt; ?>">
					<input type="hidden" name="targettable" value="<?php echo $tableno; ?>">
					<input type="hidden" name="sc" value="<?php echo $sc; ?>">
					<button type="submit" class="sbtn btnok">Clear <i class="icon-export-alt"></i></button>
				</form>
			</div>
		</article>
		<footer>
			<i>Thank you!! Have a wonderful day!!</i><br/>
			<H2>The Coffee</H2>
			"A very special place for Cakes and The Coffee"<br/>
			<br>
			<div class="btnbox">
				<div class="center">
					<div id="TA_restaurantWidgetWhite209" class="TA_restaurantWidgetWhite">
						<ul id="VRSnKVL" class="TA_links 8NcXKnRm">
							<li id="omK59N5j6Ic6" class="AoPrHs"><a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/partner/tripadvisor_logo_117x18-24177-2.png" alt="TripAdvisor"/></a>
							</li>
						</ul>
					</div>
					<script async src="https://www.jscache.com/wejs?wtype=restaurantWidgetWhite&amp;uniq=209&amp;locationId=7679566&amp;icon=cupOfCoffee&amp;lang=en_US&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
				</div>
			</div>

			<div class="btnbox">
				<h3>like us? follow us!!</h3>
				<div class="center">
					<img src="https://blogfiles.pstatic.net/MjAyMDA4MjhfMTQ3/MDAxNTk4NTk3MDQ3Mjk5.-nd2jNonNdDSBw2IlZSuwOf7XxCKKcz-shdAADvJIjkg.ku04Z7hK3O-9LWNglGOmXrEzFQBxQ1GD26t6_wsvpJgg.PNG.the__coffee/the_coffee_facebook.png?type=w3" width="75" height="75"><i class="icon-left-circled"></i> facebook / 
					instagram <i class="icon-right-circled"></i> <img src="https://blogfiles.pstatic.net/MjAyMDA4MjhfMjQg/MDAxNTk4NTk3MDQ4MDE5._tZ4SiesfPeQtuao9ExD0b939von-uANT8d5FahoEmIg.7yrC8Af3QFkZumV2jN1OfjBKKJrESMVgfxr07YI4MJcg.PNG.the__coffee/the_coffee_instagram.png?type=w3" width="70" height="70">
				</div>
			</div>

		</footer>
	</body>
</html>

