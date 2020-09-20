<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>cafe The Coffee Order Management System</title>
		<link rel="stylesheet" href="../../oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
	</head>

	<body>
	    <header>
	    	<button class="hbutton hdibutton" style="vertical-align:middle" onclick="location.href='../../index.html';"><span>Administrative Inquiry</span></button>
	    </header>
	    <article>
			<?php
				include '../../repository.php';

				$searchdate = strtotime($_POST['searchdate']);
				$dispyear = date('Y', $searchdate);
				$dispmonth = date('m', $searchdate);
				$mmonth = date('M',$searchdate);
				$dispdate = date('d', $searchdate);
				$disphour = date('H', $searchdate);
				$dispmin = date('i', $searchdate);

				$dayarr = array('sunday','monday','tuesday','wednesday','thursday','friday','saturday');
				$whatday = date('w', $searchdate);
				echo "<h2>".$dispdate." ".$mmonth." ".$dispyear.", ".$dayarr[$whatday]."</h2>";
			?>

			<form action="../showbilldetail.php" method="POST">
				<table class="inquiry">
					<tr>
						<td>time</td>
						<td>table no</td>
						<td>amount</td>
						<td>bill no</td>
					</tr>

		<!-- recall today's sales from totalbill.txt -->

				  	<?php
						$fntb = $repository."oms1/record/record/total/totalbill.txt";
						$saleslinearr = file($fntb);

						foreach($saleslinearr AS $case) {
							$aday = explode(":", $case);
							$pdate = $aday[1]."-".$aday[2]."-".$aday[3];
							$targetdate = strtotime($pdate);

							if ($targetdate == $searchdate) {
								$billamount = end($aday);
								echo "<tr><td>".$aday[4].":".$aday[5]."</td><td>".$aday[6]."</td><td>".number_format($billamount)."</td><td><button class=\"billbtn\" name=\"billno\" value=\"".$aday[0]."\">".$aday[0]."</button></td></tr>";
								$adaysales += $billamount;
							}
						}
					?>
				</table>
			</form>
			<hr>
			<?php
				echo "<h3>sum : ".number_format($adaysales)."</h3>";
			?>
			<div class="btnbox">
				<input type="button" class="sbtn btnno" value="Back" onclick="location.href='inqindex.html'">
    		</div>
		</article>
	</body>
</html>	