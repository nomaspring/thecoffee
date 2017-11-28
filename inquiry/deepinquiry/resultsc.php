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
				switch ($_POST['period']) {
					case 'current':
						include 'showmonthlysc.php';
						break ;
					case 'past': 
						echo 'under building';
						break ;
				}

			?>



		</article>
	</body>
</html>