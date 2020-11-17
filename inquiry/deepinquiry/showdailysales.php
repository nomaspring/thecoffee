<html>
	<?php
		include '../../repository.php';

		$days = intval(((strtotime($_POST['dateuntil'])-strtotime($_POST['datefrom']))/86400)+1);
		echo "<h3>period : {$_POST['datefrom']} till {$_POST['dateuntil']}</h3>";
		echo "inquiry : {$_POST['inquiry']}, {$days} days";
	?>

	<hr>
	<form action="showdaysbills.php" method="POST">
		<table class="inquiry">
			<tr>
				<td>date</td>
				<td>sales</td>
				<td>details</td>
			</tr>

<!-- recall today's sales from totalbill.txt -->

		  	<?php
		  		$datefrom = strtotime($_POST['datefrom']);
		  		$dateuntil = strtotime($_POST['dateuntil']);

				$fnds = $repository."oms1/record/record/total/dailysales.txt";
				$salesinlinearr = file($fnds);

				$chartData = array();

				foreach($salesinlinearr AS $case) {
					$dailysales = explode(":", $case);
					$pdate = $dailysales[0]."-".$dailysales[1]."-".$dailysales[2];
					$searchdate = strtotime($pdate);

					if ($datefrom <= $searchdate and $searchdate <= $dateuntil) {
						$dailyamount = end($dailysales);
						$countIndex = $dailysales[1]."/".$dailysales[2]." ".$dailysales[0];
					    echo "<tr><td>".$countIndex."</td>
					    	<td>".number_format($dailyamount)."</td>
					    	<td><button class=\"billbtn\" name=\"searchdate\" value=\"".$pdate."\">details</button></td></tr>";
					    $totalamount += $dailyamount;

					    $chartData[] = [$countIndex, $dailyamount];

					}
				}
			?>
		</table>
	</form>
	<hr>
	<?php
		echo "<h3>sum : ".number_format($totalamount)."</h3>";
		echo "average : ".number_format($totalamount/$days);
		echo "<br>";

		//changing chart data in chart_anal.html
		$newChartData = "";
		foreach ($chartData as $key => $value) {
			$newChartData = $newChartData.",['".$value[0]."',".$value[1]."]"; 
		}
	?>
	<div class="btnbox">
			<input type="button" class="sbtn btnno" value="Back" onclick="location.href='inqindex.html'">
			<input type="button" class="sbtn btnok" value="view Chart" onclick="location.href='chart_anal.html'">

    </div>
    <br>
	<?php
		echo $newChartData;
	?>
</html>	

