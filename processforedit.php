<!DOCTYPE html>
<html>

	<?php
		$itemcount = count($_POST);
		echo "order details of table : <strong>".$_POST['pretable']." => ".$_POST['tabno']."</strong><br/>";
	?>

	<?php
		include 'pricematching.php';
   	?>
	<hr/>
	<?php
		include 'ordertableforedit.php';
	?>
	<hr/>
	<form action="saveonfileforedit.php" method="POST" style="display: inline-block;">
		<input type="hidden" name="pretable" value="<?php echo $_POST['pretable']; ?>">
		<input type="hidden" name="ordertable" value="<?php echo $_POST['tabno']; ?>">
		<input type="hidden" name="savetext" value="<?php echo $ordertext; ?>">
		<input type="submit" value="OK">
	</form>

	<input type="button" value="Cancel" id="btncancel" onclick="discardorder();">

    <script>
		function discardorder(){
			var yesorno = confirm("cancel orders?");
			if(yesorno){
				window.location.href='index.html';
			}
		};
    </script>

</html>

