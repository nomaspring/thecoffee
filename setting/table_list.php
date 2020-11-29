<!DOCTYPE html>
<html lang="ko">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>cafe The Coffee Billing System</title>
    <link rel="stylesheet" href="simplePage.css?mut=<?php echo time()?>" type="text/css" media="screen">
</head>
<body>
	<form action="confirmNewTable.php" method="POST">

	<div class="grid-container">
		<div class="grid-item">
			<?php
			include '../repository.php';
			include '../showtableno.php';
			echo '<h3>current table list :</h3>';
			foreach ($tablearray as $value) {
				echo $value.'<br>';
			}
			$oldTableText = implode("\n", $tablearray);
			?>
		</div>	
		
		<div class="grid-item">
			<?php
			echo '<h3>new table list :</h3>';
			echo '<textarea name="allTable" rows="20">';
			echo $oldTableText;
			echo '</textarea>';
			?>
		</div>
	</div>	
		
	<div class="btnbox">
		<input type="button" onclick="location.href='indexForPreference.php'" value="cancel and back">
		<button class="mainbtn">save</button>
	</div>

	</form>
	<p><pre>
type new table list in text box directly.
classify table name with enter-key

do not use "/(slash)" character in table name.
do not use space(blank) for first and last character of table name.
	</pre></p>

</body>

</html>
