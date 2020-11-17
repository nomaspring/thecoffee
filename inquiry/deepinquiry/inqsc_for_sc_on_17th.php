<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>cafe The Coffee Order Management System</title>
		<link rel="stylesheet" href="../../oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
	</head>
	<body>
	    <header>
	      <button class="hbutton hdibutton" style="vertical-align:middle" onclick="location.href='../../index.php';"><span>Administrative Inquiry</span></button>
	    </header>
	    <article>

			<?php
				include '../../repository.php';
				include '../../daycount.php';

				$filePath = $repository."oms1/record/initdata/employee.txt";
				$worker = file($filePath);
				foreach($worker AS $workername) {
					$personinfo = explode(":", $workername);
					if (!isset($personinfo[3])) {
						$workers[] = $personinfo[0];
					}
				}

// today's acculumated s/c

				echo "<h3>service charge</h3><br/>";
				echo "<hr>";

				$fnsc = $repository."oms1/record/record/scdata/sc.txt";
				$allline = file($fnsc);
				foreach ($allline as $line) {
					$scarray = explode(":", $line);
					if ($scarray[0]==$dispyear and $scarray[1]==$dispmonth and $scarray[2]==$dispdate) {
						$todayssc+=end($scarray);
					}
				}
				echo "today's total : ".number_format($todayssc)." rps";
				echo "<hr>";

// current terms accumulated s/c

				if (intval($dispdate)<17) {
					if (intval($dispmonth)==1) {
						$dispyear = $lastyear;
					}
					$dispmonth = $lastmonth;
				}
				$yearfrom = $dispyear;
				$monthfrom = $dispmonth;

				$chrmonthfrom = date('M',$monthfrom);
				echo "this term : from <u>17th  {$chrmonthfrom}, {$yearfrom}</u> till yesterday";

				echo "<table style=\"text-align:right\"><tr>";
				foreach ($workers as $value) {
					echo "<td>{$value}</td>";
				}
				echo "<td>sum</td></tr>";
				echo "<tr>";

				$begintime = $yearfrom.$monthfrom."17";
				$filePath = $repository."oms1/record/record/scdata/scdaily.txt";
				$dailysctotal = file($filePath);
				$i = 0;
				foreach ($workers as $value) {
					foreach($dailysctotal AS $scdaily) {
						$scdailydetail = explode(":", $scdaily);
						$sctime = $scdailydetail[0].$scdailydetail[1].$scdailydetail[2];
						if (intval($sctime)>=intval($begintime)) {
							$amount += $scdailydetail[4+$i];
						}
					}
					echo "<td>".number_format($amount)."</td>";
					$sctotal += $amount;
					$amount = 0;
					$i++;
				}
				echo "<td>".number_format($sctotal)."</td>";
				echo "</tr></table>";
				echo "<hr>";
			?>

			<div class="btnbox">
					<input type="button" class="sbtn btnno" value="Back" onclick="location.href='../todayssales.php'">
		    </div>


		</article>
	</body>
</html>