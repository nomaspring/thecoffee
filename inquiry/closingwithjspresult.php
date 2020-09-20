<html>
<head>
	<style type="text/css">
        td {
        	text-align: right;
        	width: 50px;
        }
	</style>
</head>
<body>

	<?php
		include '../repository.php';
		include '../daycount.php';
		$closing = $_POST;

		$fnclosing = $repository.'oms1/record/record/total/closing.txt';
		$fp = fopen($fnclosing, "w+");
		fwrite($fp, date("Y-m-d, H:i", $nepaltime)."\n");

		foreach ($closing as $key => $value) {
			$linetext = implode(":", $value);
			fwrite($fp, $linetext."\n");
		}
		fwrite($fp, $closing['todaysales']);
		fclose($fp);
	?>
 	<?php include 'closinginquiry.php'; ?>

</body>	
</html>
