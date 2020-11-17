<html>
	<?php
		include 'repository.php';
		unlink($repository."oms1/record/record/{$_POST['pretable']}.txt");
		$fn = $repository."oms1/record/record/{$_POST['ordertable']}.txt";
		$ft = $_POST['savetext'];
		$cf = fopen($fn, "w");
		fwrite($cf, $ft);
		fclose($cf);
		header('Location: index.php');
	?>
</html>          