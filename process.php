<!DOCTYPE html>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta charset="utf-8">
	    <title>cafe The Coffee Order Management System</title>
	    <link rel="stylesheet" href="oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
	</head>
	<body>
		<?php
			$itemcount = count($_POST);
			echo "order details of table : <strong>".$_POST['tabno']."</strong><br/>";
		?>

		<?php
			include 'initdata/pricematching.php';
	   	?>
		<hr/>

		<?php
			include 'ordertable.php';
		?>
		<hr/>
		<form action="saveonfile.php" method="POST">
			<input type="hidden" name="ordertable" value="<?php echo $_POST['tabno']; ?>">
			<input type="hidden" name="savetext" value="<?php echo $ordertext; ?>">
			<input type="hidden" name="sc" value="<?php echo $sc; ?>">
	        <div class="btnbox">
				<input type="button" class="sbtn btnno" value="Cancel" id="btncancel" onclick="discardorder();">
				<input type="submit" class="sbtn btnok" value="OK">
			</div>
		</form>

	    <script>
			function discardorder(){
				var yesorno = confirm("cancel orders?");
				if(yesorno){
					window.location.href='index.html';
				}
			};
	    </script>
	</body>
</html>

