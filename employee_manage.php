<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>The Coffee Family</title>
		<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
		<style>
			body{
				font-family: 'Crimson Text', serif;
			}
			.grid{
				display: grid;
				grid-template-columns: 30px 1fr 1fr 1fr 1fr;
				border-top: 1px solid gray;
				padding-top: 3px;
				padding-bottom: 3px
			}
			div.grid:hover{
				color: blue;
/*				font-size: 1.1em;
*/			}
			input{
				border: none;
				width: 80%;
			}
			input>button{
				border: 1px solid;
			}
			input.editable{
				border: 1px solid gray;
			}
			button{
				margin-right: 3px;
			}
			button.btnadd{
				background-color: blue;
				color: white;
			}
			button.btnsave{
				background-color: green;
				color: white;
			}
			button.btncancel{
				background-color: red;
				color: white;
			}
			div.btnbox{
				padding: 10px;
				text-align: center;
			}
			div.headbtn{
				text-align: right;
			}
			button#switch{
				color: blue;
			}

		</style>
	</head>

	<body>
	    <header>
	      <h2>The Coffee Family</h2>
	    </header>

	    <article>
			<div class="btnbox headbtn">
				<button id="switch">show present only / show all</button>
			</div>
			
			<form action="employee.php" method="POST">
				<div id="contents">
					<div class="grid head">
						<div>no</div>
						<div>name</div>
						<div>s/c rate</div>
						<div>join</div>
						<div>resign</div>
					</div>
					<?php 
						include 'repository.php';

						// $workers = array();
						$worker = file($repository.'oms1/record/initdata/employee.txt');
						$i = 1;
						foreach($worker AS $workername) {
							$scratio = explode(":", trim($workername));
							if (isset($scratio[3])) {
								echo '<div class="grid quit">';
							} else {
								echo '<div class="grid">';
							}
							echo '<input type="text" class="no" value="'.$i.'"><input type="text" class="name" name="'.$i.'name" value="'.$scratio[0].'"><input type="text" class="join" name="'.$i.'join" value="'.$scratio[1].'"><input type="text" class="scrate" name="'.$i.'scrate" value="'.$scratio[2].'"><input type="text" class="resign" name="'.$i.'resign" value="'.$scratio[3].'">';
							echo '</div>';
							$i++;
						}
					?>

				</div>

				<div class="btnbox">
					<button class="btnadd">add</button>
					<button type="submit" class="btnsave" onclick="alert('changes saved')">save changes</button>
					<button type="button" class="btncancel" onclick="location.href='index.php'">back</button>
				</div>
			</form>

		</article>

	    <hr>
	    <button class="btnmanager" onclick="location.href='https://docs.google.com/spreadsheets/d/122Z4UTlLbmBOXCLko9vPAsS4X7tSL8VnhSeu1YPn_lI/edit#gid=815331333';">time card</button>    


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	    <script>

		    $(document).ready(function(){
		    	$(".quit").hide();
		    })

			$("#switch").on("click", function(){
				$(".quit").toggle(600);
	    	})

			$(".btnadd").on("click", function(){
				// var nmember = $("#contents").children().last();
				var newno = parseInt($("#contents").children().last().find(".no").val())+1;

				var newtext = '<div class="grid"><input type="text" class="no" value="'+newno+'"><input type="text" class="name editable" name="'+newno+'name" value=""><input type="text" class="join editable" name="'+newno+'join" value=""><input type="text" class="scrate editable" name="'+newno+'scrate" value=""><input type="text" class="resign" name="'+newno+'resign" value=""></div>';

				$("#contents").append(newtext);

				$(this).attr("disabled",true);

			})
	    	

	    </script>
	</body>
</html>