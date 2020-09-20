<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>closing</title>
    <link rel="stylesheet" href="../oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
</head>
<body>
	<h3>Closing daily sales</h3>
	<hr/>
	today's sales : <?php echo number_format($_POST['todaysales']); ?> rps
	<hr/>
	changes : 
	<form action="closingwithphpresult.php" method="POST">
		<table>
			<tr>
				<td>bill</td>
				<td>q'ty</td>
			</tr>
			<tr>
				<td>1000</td>
				<td><input type="number" min="0" name="1000" value=""></td>
			</tr>
			<tr>
				<td>500</td>
				<td><input type="number" min="0" name="500" value=""></td>
			</tr>
			<tr>
				<td>100</td>
				<td><input type="number" min="0" name="100" value=""></td>
			</tr>
			<tr>
				<td>50</td>
				<td><input type="number" min="0" name="50" value=""></td>
			</tr>
			<tr>
				<td>20</td>
				<td><input type="number" min="0" name="20" value=""></td>
			</tr>
			<tr>
				<td>10</td>
				<td><input type="number" min="0" name="10" value=""></td>
			</tr>
			<tr>
				<td>5</td>
				<td><input type="number" min="0" name="5" value=""></td>
			</tr>
		</table>
		<div class="btnbox">
         	<input type="hidden" name="todaysales" value="<?php echo $_POST['todaysales']; ?>">
        	<input type="submit" class="sbtn btncontinue" value="excute">
        </div>
	</form>

</body>	
</html>
