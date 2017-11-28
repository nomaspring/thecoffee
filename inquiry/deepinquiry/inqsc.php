<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>cafe The Coffee Order Management System</title>
		<link rel="stylesheet" href="/oms1/supervisor/oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
	</head>
	<body>
	    <header>
	      <button class="hbutton hdibutton" style="vertical-align:middle" onclick="location.href='/oms1/supervisor/index.html';"><span>Administrative Inquiry</span></button>
	    </header>
	    <article>

			<?php
				$nepaltime=mktime()+(3600*14-(60*15));
				$curryear = date('Y', $nepaltime);
				$currmonth = date('m', $nepaltime);
				$currdate = date('d', $nepaltime);
				$currhour = date('H', $nepaltime);
				$currmin = date('i', $nepaltime);

				$filePath = "../../initdata/employee.txt";
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
				echo "todays :";
				echo "<table><tr>";
				foreach ($workers as $value) {
					echo "<td>{$value}</td>";
				}
				echo "<td>sum</td></tr>";
				echo "<tr>";

				$filePath = "D:/OneDrive/billing/record/scdata/sc.txt";
				$todaysctotal = file($filePath);
				$i = 0;
				foreach ($workers as $value) {
					foreach($todaysctotal AS $scbill) {
						$scdetail = explode(":", $scbill);
						if ($scdetail[0]==$curryear and $scdetail[1]==$currmonth and $scdetail[2]==$currdate) {
							$amount += $scdetail[6+$i];
						}
					}
					echo "<td>".intval($amount)."</td>";
					$sctotal += intval($amount);
					$amount = 0;
					$i++;
				}
				echo "<td>{$sctotal}</td>";
				echo "</tr></table>";
				echo "<hr>";

// current terms accumulated s/c

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
				echo "this term : from <u>17th  {$chrmonthfrom}, {$yearfrom}</u> till yesterday";

				echo "<table><tr>";
				foreach ($workers as $value) {
					echo "<td>{$value}</td>";
				}
				echo "<td>sum</td></tr>";
				echo "<tr>";

				$begintime = $yearfrom.$monthfrom."17";
				$filePath = "D:/OneDrive/billing/record/scdata/scdaily.txt";
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
					echo "<td>".intval($amount)."</td>";
					$sctotal += intval($amount);
					$amount = 0;
					$i++;
				}
				echo "<td>{$sctotal}</td>";
				echo "</tr></table>";
				echo "<hr>";
			?>

			<div class="btnbox">
					<input type="button" class="sbtn btnno" value="Back" onclick="location.href='/oms1/supervisor/inquiry/todayssales.php'">
		    </div>


		</article>
	</body>
</html>