<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>cafe The Coffee Order Management System</title>
		<link rel="stylesheet" href="oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
	</head>	
	<body>
		<header>
			check who worked yesterday :
		</header>
		<article>
			<form action="saveonfileforworkers.php" method="POST">
				<div class="btnbox">
					<?php
						include "repository.php";
						include "workers.php";
						foreach ($workers as $key => $value) {
							echo "<label><input type=\"checkbox\" name=\"actualworker[]\" checked=\"checked\" value=\"{$key}\"/>{$key}</label><br/>";
						}
					?>
					<br/>
					<input type="submit" class="sbtn btnok" value="Done">
				</div>
			</form>
		</article>
	</body>
</html>

