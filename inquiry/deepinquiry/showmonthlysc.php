<html>
	<?php
		$nepaltime=mktime()+(3600*14-(60*15));
		$curryear = date('Y', $nepaltime);
		$currmonth = date('m', $nepaltime);
		$currdate = date('d', $nepaltime);
		$currhour = date('H', $nepaltime);
		$currmin = date('i', $nepaltime);

		if (intval($currmonth)==1){
			if (intval($currdate)<17) {
				$yearfrom = $curryear-1;
				$monthfrom = 12;
			} else {
				$yearfrom = $curryear;
				$monthfrom = $currmonth;
			}
		} else {
			if (intval($currdate)<17) {
				$yearfrom = $curryear;
				$monthfrom = $currmonth-1;
			} else {
				$yearfrom = $curryear;
				$monthfrom = $currmonth;
			}
		}
		$chrmonthfrom = date('M',$monthfrom);
		echo "<h3>period : from <u>17th  {$chrmonthfrom}, {$yearfrom}</u> till now</h3>";
	?>

<!-- recall today's sales from totalbill.txt -->

	<?php
		  		$datefrom = strtotime($_POST['datefrom']);
		  		$dateuntil = strtotime($_POST['dateuntil']);

				$fnds = "d:/onedrive/billing/record/total/dailysales.txt";
				$salesinlinearr = file($fnds);

				foreach($salesinlinearr AS $case) {
					$dailysales = explode(":", $case);
					$pdate = $dailysales[0]."-".$dailysales[1]."-".$dailysales[2];
					$searchdate = strtotime($pdate);

					if ($datefrom <= $searchdate and $searchdate <= $dateuntil) {
						$dailyamount = end($dailysales);
					    echo "<tr><td>".$dailysales[1]."/".$dailysales[2].", ".$dailysales[0]."</td><td>".number_format($dailyamount)."</td><td><button class=\"billbtn\" name=\"searchdate\" value=\"".$pdate."\">details</button></td></tr>";
					    $totalamount += $dailyamount;
					}
				}
			?>
		</table>
	</form>
	<hr>
	<?php
		echo "<h3>sum : ".number_format($totalamount)."</h3>";
		echo "average : ".number_format($totalamount/$days);
	?>
	<div class="btnbox">
			<input type="button" class="sbtn btnno" value="Back" onclick="location.href='/oms1/supervisor/inquiry/deepinquiry/inqindex.html'">
    </div>
</html>	

