<?php

?>

<!doctype html>
<html>

 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>daily expenses</title>
    <link rel="stylesheet" href="simplePage.css?mut=<?php echo time()?>" type="text/css" media="screen">
</head>

<body>
	<header>
		<h3>Company Info</h3>
	</header>

	<article>
		<?php
		include '../repository.php';
		$fileInfo = file($repository.'oms1/record/initdata/companyInfo.txt');
		$comArr = array();
		foreach ($fileInfo as $value) {
			$infoData = explode("|", trim($value));
			$comArr[$infoData[0]] = $infoData[1];
		}
		?>

	   <form action="companyInfo.php" method="POST">
			<fieldset><legend>company info</legend>
				<div>
			 		Company name : 
			 		<input type="text" value="<?php echo $comArr['comName'];?>" name="comName" placeholder="campany name and shop name, if names are different">
			 	</div>
			 	<div>
			 		PAN number : 
			 		<input type="number" value="<?php echo $comArr['comPAN'];?>" name="comPAN" placeholder="9 digit" min="111111111" max="999999999">
				</div>
				<div>
			 		Address : 
					<input type="text" value="<?php echo $comArr['comAdd'];?>" name="comAdd" placeholder="full address">
				</div>
				<div>
					Web page : 
					<input type="url" value="<?php echo $comArr['comUrl'];?>" name="comUrl" placeholder="homepage or sms account with full address">
				</div>
				<div>
			 		Contact no : 
					<input type="text" value="<?php echo $comArr['comContact'];?>" name="comContact" placeholder="company land line no as possible">
				</div>
				<div>
			 		App Master No : 
			 		<input type="text" value="<?php echo $comArr['appMaster'];?>" name="appMaster" placeholder="number and a name of manager who manage apps">
				</div>

			</fieldset>
			<fieldset><legend>billing info</legend>
				<div>
					Initiating Bill Number : 
					<input type="number" value="<?php echo $comArr['billNumber'];?>" name="billNumber" placeholder="automatically and incrementally increasing onward">
				</div>
				<div>
					Slogan or Catchphrase : 
					<textarea placeholder="will be shown on bill" name="slogan"><?php echo $comArr['slogan'];?>
					</textarea>
				</div>
				<div>
					Business Logo : 
					<input type="file" name="comLogo" accept="image/png, image/jpeg">
				</div>

			</fieldset>

   		<div class="btnbox">
				<button type="button" onclick="location.href='indexForPreference.php'">home <i class="icon-home"></i></button>
				<button>save <i class="icon-floppy"></i></button>
			</div>
			</form>


	</article>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script>

		$("legend").on("click", function(){
			$(this).siblings().toggle(600);
    	})

    </script>
</body>
</html>