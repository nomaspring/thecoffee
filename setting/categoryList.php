<!DOCTYPE html>
<html lang="ko">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>cafe The Coffee Billing System</title>
    <link rel="stylesheet" href="simplePage.css?mut=<?php echo time()?>" type="text/css" media="screen">
</head>
<body>
	<form action="confirmNewCategory.php" method="POST">

	<div class="grid-container">
		<div class="grid-item">
			<?php
			include '../repository.php';
			$rawFile = file($repository.'oms1/record/initdata/catlist.txt');
			echo '<h3>current category list :</h3>';
			for ($i=0; $i<count($rawFile) ; $i++) { 
				echo $rawFile[$i].'<br>';
			}
			?>
		</div>	
		
		<div class="grid-item">
			<?php
			echo '<h3>new category list :</h3>';
			echo '<textarea name="allCategory" rows="12">';
			for ($i=0; $i<count($rawFile) ; $i++) { 
				echo $rawFile[$i];
			}
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
type category list in text box directly.
classify category list with enter-key

do not use space(blank) for first and last character of category name.
	</pre></p>

</body>

</html>