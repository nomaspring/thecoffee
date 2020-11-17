<?php
	include 'repository.php';
	include 'daycount.php';
	include 'workers.php';

	$fntc = $repository."oms1/record/record/scdata/timecard.txt";
	$lasttc = end(file($fntc));
	$lasttcdetail = explode(":", $lasttc);
	if ($lasttcdetail[2]==$yesterday) {
		echo "<script>alert(\"already done!! click tomorrow morning again\"); location.href='index.php';</script>";
	} else {

/* to make month when change month*/
		if ($dispdate !== 1) {
		} elseif ($dispmonth == 1) {
			$dispyear = $lastyear;
			$dispmonth = $lastmonth;
		} else {
			$dispmonth = $lastmonth;
		}
 
		$fnsc = $repository."oms1/record/record/scdata/sc.txt";
		$scinlines = file($fnsc);
		foreach ($scinlines as $line) {
			$targetline = explode(":", $line);
			if ($targetline[0] == $dispyear and $targetline[1] == $dispmonth and $targetline[2] == $yesterday) {
				$scdailytotal += $targetline[5];
			}
		}

		$actualworker = array($dispyear, $dispmonth, $yesterday);
		$scdailypersonal = $actualworker;
		array_push($scdailypersonal, $scdailytotal);
		foreach ($workers as $worker => $perratio) {
			if (in_array($worker, $_POST['actualworker'])) {
				$wperson[] = $perratio;
			}	else {
				$wperson[] = 0;
			}
			$wsc[] = number_format((end($wperson)*($scdailytotal))/$totalhead);
		}

		$newtimecard = "\n".implode(":", array_merge($actualworker, $wperson));
		$tcline = fopen($fntc, "a");
		fwrite($tcline, $newtimecard);
		fclose($tcline);

		$yesterdaysscdaily = "\n".implode(":", array_merge($scdailypersonal, $wsc));
		$fnsd = $repository."oms1/record/record/scdata/scdaily.txt";
		$newsd = fopen($fnsd, "a");
		fwrite($newsd, $yesterdaysscdaily);
		fclose($newsd);

		header('Location: index.php');
	}
?>