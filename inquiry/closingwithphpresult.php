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
		foreach ($closing as $key => $value) {
			$cbill[] = $key;
			$ccash[] = $value;
		}
		$cbtext = implode(":", $cbill);
		$cctext = implode(":", $ccash);
		fwrite($fp, date("Y-m-d, H:i", $nepaltime)."\n");
		fwrite($fp, $cbtext."\n");
		fwrite($fp, $cctext);
		fclose($fp);
	?>
	<?php include 'closinginquiry.php'; ?>

</body>	
</html>
