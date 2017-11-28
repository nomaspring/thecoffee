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
				switch ($_POST['inquiry']) {
					case 'daily':
						include 'showdailysales.php';
						break ;
					case 'monthly': 
						include 'showmonthlysales.php';
						break ;
					case 'yearly': 
						echo "<h2>Do you need yearly summary???<br/>I don't think so.</h2>";
						echo "<div class=\"btnbox\"><input type=\"button\" class=\"sbtn btnno\" value=\"Back\" onclick=\"location.href='/oms1/supervisor/inquiry/deepinquiry/inqindex.html'\"></div>";
						break ;
				}

			?>



		</article>
	</body>
</html>