<html>
	<p>
		check who served for these guests below ....
	</p>

	<form action="saveonfileforclear.php" method="POST" style="display: inline-block;">

		<?php
			include "workers.php";
		?>
		<?php
			foreach ($workers as $key => $value) {
				echo "<label>{$key}<input type=\"checkbox\" name=\"actualworker[]\" value=\"{$key}\"/></label><br/>";
			}
		?>
		<br/>

		<input type="hidden" name="targettable" value="<?php echo $_POST['targettable']; ?>">
		<input type="hidden" name="sc" value="<?php echo $_POST['sc']; ?>">
		<br/>
		<input type="submit" value="Home">
	</form>

</html>

