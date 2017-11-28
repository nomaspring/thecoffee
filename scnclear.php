<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>cafe The Coffee Order Management System</title>
		<link rel="stylesheet" href="oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
	</head>	
	<body>
		<header>
			check available workers
		</header>
		<article>
			<form action="saveonfileforclear.php" method="POST">
				<div class="btnbox">
					<?php
						include "initdata/workers.php";
					?>
					<?php
						foreach ($workers as $key => $value) {
							echo "<label><input type=\"checkbox\" name=\"actualworker[]\" value=\"{$key}\"/>{$key}</label><br/>";
						}
					?>
					<br/>
					<input type="hidden" name="newbillno" value="<?php echo $_POST['newbillno']; ?>">
					<input type="hidden" name="cleargt" value="<?php echo $_POST['cleargt']; ?>">
					<input type="hidden" name="targettable" value="<?php echo $_POST['targettable']; ?>">
					<input type="hidden" name="sc" value="<?php echo $_POST['sc']; ?>">
					<br/>
					<input type="submit" class="sbtn btnok" value="Finish">
				</div>
			</form>
		</article>
	</body>
</html>

