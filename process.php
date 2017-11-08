<!DOCTYPE html>
<html>

	<?php
		$itemcount = count($_POST);
		echo "order details of table : <strong>".$_POST['tabno']."</strong><br/>";
	?>

	<?php
		include 'pricematching.php';
   	?>
	<hr/>
	<?php
		include 'ordertable.php';
	?>
	<hr/>
	<form action="saveonfile.php" method="POST" style="display: inline-block;">
		<input type="hidden" name="ordertable" value="<?php echo $_POST['tabno']; ?>">
		<input type="hidden" name="savetext" value="<?php echo $ordertext; ?>">
		<input type="hidden" name="sc" value="<?php echo $sc; ?>">

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

