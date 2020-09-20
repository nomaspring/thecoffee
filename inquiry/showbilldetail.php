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
			<button class="hbutton hibutton" style="vertical-align:middle" onclick="location.href='../index.html';"><span>Administrative Inquiry</span></button>
	    </header>
	    <article>
			<table>
				<tr>
					<td>no</td>
					<td>item</td>
					<td>count</td>
				</tr>
				<?php
					include '../repository.php';
					$filePath = $repository."oms1/record/record/billdata/{$_POST['billno']}.txt";
					$lines = file($filePath);
					foreach($lines AS $line) {
						$eachorder = explode(":", $line);
							echo "<tr><td>".$eachorder[0]."</td><td>".$eachorder[1]."</td><td>".$eachorder[3]."</td></tr>";
					}
				?>
			</table>
			<div class="btnbox">
	  			<input type="button" class="sbtn btnno" value="Back" onclick="location.href='todayssales.php'">
	        </div>
		</article>
	</body>
</html>
