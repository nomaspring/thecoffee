<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>cafe The Coffee Order Management System</title>
		<link rel="stylesheet" href="../oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
	</head>

	<body>
	    <header>
	      <button class="hbutton hibutton" style="vertical-align:middle" onclick="location.href='../index.php';"><span>Administrative Inquiry</span></button>
	    </header>
	    <article>
<!-- show all bills in today -->
			<?php 
				include '../repository.php';
				include '../daycount.php';

				$dayarr = array('sunday','monday','tuesday','wednesday','thursday','friday','saturday');
				$whatday = date('w', $nepaltime);
				$texthead = $dispdate." ".$mmonth.", ".$dayarr[$whatday];
				echo "<h3>".$texthead."</h3>";
				echo "<hr>";
				$inqfile = fopen($repository.'oms1/record/record/inqcurrent.txt', "w");
				fwrite($inqfile, $texthead."\n\n");

			 ?>

			<div class="container">
				<div class="inner">
					<?php include 'showtodaysbills.php';
						fwrite($inqfile, "\n");

					 ?>
				</div>
				<div class="inner">
					<?php include 'showtodaysorders.php';
						fwrite($inqfile, "\n");
					 ?>
				</div>
			</div>

			<hr/>
<!-- show total sales in today -->
			<p>
				<?php
					echo "table count : <strong>{$tc}</strong><br/>";
					echo "sales total : <strong>".number_format($todaysales)."</strong>";
					fwrite($inqfile, "table count : ".$tc."\n");
					fwrite($inqfile, "sales total : ".number_format($todaysales)."\n");
					fclose($inqfile);
				?>
			</p>

		    <form action="closingwithjsp.php" method="POST">
				<div class="btnbox">
		  			<button type="button" class="sbtn btnno" onclick="location.href='../index.php'">Back</button>
		        	<input type="hidden" name="todaysales" value="<?php echo $todaysales; ?>">
		        	<button class="sbtn btncontinue">closing on counter</button>
		        </div>
		    </form>
	        <br/>

			<div class="btnbox">
		        <button class="sbtn btncontinue btnccl" onclick="location.href='deepinquiry/inqindex.html'">inquire sales</button>
		        <button class="sbtn btncontinue btnccl" onclick="location.href='deepinquiry/inqsc.php'">inquire s/c</button>
		        <button class="sbtn btncontinue btnccl" onclick="location.href='closinginquiry.php'">closing</button>
	        </div>


		</article>
	</body>
</html>