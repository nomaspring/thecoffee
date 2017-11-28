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
	      <button class="hbutton hibutton" style="vertical-align:middle" onclick="location.href='/oms1/supervisor/index.html';"><span>Administrative Inquiry</span></button>
	    </header>
	    <article>
<!-- show all bills in today -->
			<?php 
				$nepaltime=mktime()+(3600*14-(60*15));
				$dispyear = date('Y', $nepaltime);
				$dispmonth = date('m', $nepaltime);
				$mmonth = date('M',$nepaltime);
				$dispdate = date('d', $nepaltime);
				$disphour = date('H', $nepaltime);
				$dispmin = date('i', $nepaltime);

				$dayarr = array('sunday','monday','tuesday','wednesday','thursday','friday','saturday');
				$whatday = date('w', $nepaltime);
				echo "<h2>Today : ".$dispdate." ".$mmonth.", ".$dayarr[$whatday]."</h2>";
			 ?>

			<div class="container">
				<div class="inner">
					<?php include 'showtodaysbills.php'; ?>
				</div>
				<div class="inner">
					<?php include 'showtodaysorders.php'; ?>
				</div>
			</div>

			<hr/>
<!-- show total sales in today -->
			<p>
				<?php
					echo "table count : <strong>{$tc}</strong><br/>";
					echo "sales amount: <strong>".number_format($todaysales)."</strong>";
				?>
			</p>

			<div class="btnbox">
	  			<input type="button" class="sbtn btnno" value="Back" onclick="location.href='../index.html'">
	        </div>
	        <br/>
			<div class="btnbox">
		        <button class="sbtn btncontinue btninq" onclick="location.href='deepinquiry/inqindex.html'">inquire sales</button>
		        <button class="sbtn btncontinue btninq" onclick="location.href='deepinquiry/inqsc.php'">inquire s/c</button>
	        </div>
		</article>
	</body>
</html>