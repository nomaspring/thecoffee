<!DOCTYPE html>
<html lang="ko">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>cafe The Coffee Billing System</title>
	<style>
		#newTableList{
			padding: 1.5em;
			font:20px; 
			width: 90%
		}
	</style>
</head>
<body>
	<form action="confirmNewTable.php" method="POST">
		
	    <?php
		include '../repository.php';
		$tabletxt = file_get_contents($repository."oms1/record/initdata/tableno.txt");
		echo '<h3>currunt table list : </h3>';
		echo '<p>'.$tabletxt.'</p>';
		echo '<h2>new table list : </h2>';
		echo '<input type="text" id="newTableList" name="allTable" value="'.$tabletxt.'">';
		?>
		<p>
			type new table list in text box directly.<br>
			do not use "/(slash)" character in table name.<br>
			do not use space(blank) for first and last character of table name.
		</p>
		<input type="button" onclick="location.href='indexForPreference.php'" value="cancel and back">
		<button class="mainbtn" id="save">save</button>
	</form>

</body>

</html>
