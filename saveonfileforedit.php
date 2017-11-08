<html>
	<?php
		unlink("record/{$_POST['pretable']}.txt");
		$fn = "record/{$_POST['ordertable']}.txt";
		$ft = $_POST['savetext'];
		$cf = fopen($fn, "w");
		fwrite($cf, $ft);
		fclose($cf);
		header('Location: index.html');
	?>
</html>          