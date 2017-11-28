<html>
	<?php
		$yearfrom = date('Y', strtotime($_POST['datefrom']));
		$yearuntil = date('Y', strtotime($_POST['dateuntil']));
		$monfrom = date('m', strtotime($_POST['datefrom']));
		$monuntil = date('m', strtotime($_POST['dateuntil']));
		$months = ($yearuntil-$yearfrom)*12+$monuntil-$monfrom+1;
		$monchrfrom = date('M', strtotime($_POST['datefrom']));
		$monchruntil = date('M', strtotime($_POST['dateuntil']));
		$startmon = $yearfrom.$monfrom;
		$endmon = $yearuntil.$monuntil;


		echo "<h3>period : {$monchrfrom} {$yearfrom} till {$monchruntil} {$yearuntil}</h3>";
		echo "inquiry : {$_POST['inquiry']}, {$months} months";
	?>

	<hr>
	<table class="inquiry">
		<tr>
			<td>year</td>
			<td>month</td>
			<td>sales</td>
		</tr>

<!-- recall today's sales from totalbill.txt -->

	  	<?php
			$fnms = "d:/onedrive/billing/record/total/monthlysales.txt";
			$salesinlinearr = file($fnms);
			foreach($salesinlinearr AS $case) {
				$monthlysales = explode(":", $case);
				$yrmon = $monthlysales[0].$monthlysales[1];
				if (intval($startmon) <= intval($yrmon) and intval($yrmon) <= intval($endmon)) {
					$monthlyamount = end($monthlysales);
				    $totalamount += $monthlyamount;
					echo "<tr><td>".$monthlysales[0]."</td><td>".$monthlysales[1]."</td><td>".number_format($monthlyamount)."</td></tr>";
				}
			}
		?>
	</table>
	<hr>
	<?php
		echo "<h3>sum : ".number_format($totalamount)."</h3>";
		echo "average : ".number_format($totalamount/$months);
	?>
	<div class="btnbox">
			<input type="button" class="sbtn btnno" value="Back" onclick="location.href='/oms1/supervisor/inquiry/deepinquiry/inqindex.html'">
    </div>
</html>	

