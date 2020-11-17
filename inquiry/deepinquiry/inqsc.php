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

			echo "<h3>service charge</h3>";

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

			echo '<div class="oneOneWrapper"><div>';

			$filePath = $repository."oms1/record/record/scdata/scdaily.txt";
			$dailysctotal = file($filePath);

			echo "<p>this month</p><ul>";
			$i = 0;
			foreach ($workers as $value) {
				foreach($dailysctotal AS $scdaily) {
					$scdailydetail = explode(":", $scdaily);
					$sctime = $scdailydetail[0].$scdailydetail[1];
					if (intval($sctime)==intval($dispyear.$dispmonth)) {
						$thisamount += $scdailydetail[4+$i];
					}
				}
				echo "<li>".$value."     : ".number_format($thisamount)."</li>";
				$thistotal += $thisamount;
				$thisamount = 0;
				$i++;
			}
			echo "<li>sum     : ".number_format($thistotal)."</li></ul>";

			if (intval($dispmonth)==1) {
				$dispyear = $lastyear;
			}

			echo '</div><div>';
			echo "<p>last month</p><ul>";
			$i = 0;
			foreach ($workers as $value) {
				foreach($dailysctotal AS $scdaily) {
					$scdailydetail = explode(":", $scdaily);
					$sctime = $scdailydetail[0].$scdailydetail[1];
					if (intval($sctime)==intval($dispyear.$lastmonth)) {
						$lastamount += $scdailydetail[4+$i];
					}
				}
				echo "<li>".$value."     : ".number_format($lastamount)."</li>";
				$lasttotal += $lastamount;
				$lastamount = 0;
				$i++;
			}
			echo "<li>sum     : ".number_format($lasttotal)."</li></ul>";
			echo '</div></div>';


			echo "<hr>";

		?>

		<div class="btnbox">
				<input type="button" class="sbtn btnno" value="Back" onclick="location.href='../todayssales.php'">
	    </div>


	</article>
</body>

</html>