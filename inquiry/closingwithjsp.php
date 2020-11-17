<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>closing</title>
    <link rel="stylesheet" href="clear.css?mut=<?php echo time()?>" type="text/css" media="screen">
</head>
<body>
	<h3>Closing daily sales</h3>
	<hr/>
	today's sales : <?php echo number_format($_POST['todaysales']); ?> rps
	<hr/>
	
	changes : 
	<span id="totalchanges"> how much?</span>
    <hr/>
	<article>

		<form action="closingwithjspresult.php" method="POST">
			<div class="gridtable">
				<div>note</div>
				<div>currency</div>
				<div>count</div>
				<div>amount</div>
			</div>
			<div class="gridtable">
				<input class="note" type="text" value="1000" name="1000npr[]">
				<input class="cur" value="npr" name="1000npr[]">
				<input class="count" type="number" value="" name="1000npr[]">
				<input class="amount" value="0" name="1000npr[]">
			</div>
			<div class="gridtable">
				<input class="note" type="text" value="500" name="500npr[]">
				<input class="cur" value="npr" name="500npr[]">
				<input class="count" type="number" value="4" name="500npr[]">
				<input class="amount" value="2000" name="500npr[]">
			</div>
			<div class="gridtable">
				<input class="note" type="text" value="100" name="100npr[]">
				<input class="cur" value="npr" name="100npr[]">
				<input class="count" type="number" value="11" name="100npr[]">
				<input class="amount" value="1100" name="100npr[]">
			</div>
			<div class="gridtable">
				<input class="note" type="text" value="50" name="50npr[]">
				<input class="cur" value="npr" name="50npr[]">
				<input class="count" type="number" value="11" name="50npr[]">
				<input class="amount" value="550" name="50npr[]">
			</div>
			<div class="gridtable">
				<input class="note" type="text" value="20" name="20npr[]">
				<input class="cur" value="npr" name="20npr[]">
				<input class="count" type="number" value="10" name="20npr[]">
				<input class="amount" value="200" name="20npr[]">
			</div>
			<div class="gridtable">
				<input class="note" type="text" value="10" name="10npr[]">
				<input class="cur" value="npr" name="10npr[]">
				<input class="count" type="number" value="10" name="10npr[]">
				<input class="amount" value="100" name="10npr[]">
			</div>
			<div class="gridtable">
				<input class="note" type="text" value="5" name="5npr[]">
				<input class="cur" value="npr" name="5npr[]">
				<input class="count" type="number" value="10" name="5npr[]">
				<input class="amount" value="50" name="5npr[]">
			</div>
			<p>foreign currency (today's usd rate : <input id="todayrate" type="number" value="111"> )</p>
			<div class="gridtable">
				<input class="irnote" type="text" value="" name="1ir[]">
				<input class="cur" value="ir" name="1ir[]">
				<input class="ircount" type="number" value="" name="1ir[]">
				<input class="amount" value="0" name="1ir[]">
			</div>
			<div class="gridtable">
				<input class="irnote" type="text" value="" name="2ir[]">
				<input class="cur" value="ir" name="2ir[]">
				<input class="ircount" type="number" value="" name="2ir[]">
				<input class="amount" value="0" name="2ir[]">
			</div>
			<div class="gridtable">
				<input class="usdnote" type="text" value="" name="1usd[]">
				<input class="cur" value="usd" name="1usd[]">
				<input class="usdcount" type="number" value="" name="1usd[]">
				<input class="amount" value="0" name="1usd[]">
			</div>
			<div class="gridtable">
				<input class="usdnote" type="text" value="" name="2usd[]">
				<input class="cur" value="usd" name="2usd[]">
				<input class="usdcount" type="number" value="" name="2usd[]">
				<input class="amount" value="0" name="2usd[]">
			</div>

			<div class="btnbox">
				<input type="hidden" name="todaysales" value="<?php echo $_POST['todaysales']; ?>">
				<button type="submit">save</button>
                <button type="button" onclick="window.print()">print</button>
                <button type="button" onclick="location.href='../index.php'">cancel</button>

			</div>
		</form>
	</article>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script>

		$(document).on("change",".count",function changeamount(){
    		var note = $(this).prev().prev().val();
    		var count = $(this).val();
    		$(this).next().val(note*count).trigger("change");
    	})

		$(document).on("change",".ircount",function changeiramount(){
    		var note = $(this).prev().prev().val();
    		var count = $(this).val();
    		$(this).next().val(note*count*1.6).trigger("change");
    	})

		$(document).on("change",".usdcount",function changeusdamount(){
    		var note = $(this).prev().prev().val();
    		var count = $(this).val();
    		var usdrate = $("#todayrate").val();
    		$(this).next().val(note*count*usdrate).trigger("change");
    	})

		$(document).on("change",".note",function changenote(){
    		var count = $(this).next().next().val();
    		var note = $(this).val();
    		$(this).next().next().next().val(note*count).trigger("change");
    	})

		$(document).on("change",".irnote",function changeirnote(){
    		var count = $(this).next().next().val();
    		var note = $(this).val();
    		$(this).next().next().next().val(note*count*1.6).trigger("change");
    	})

		$(document).on("change",".usdnote",function changeusdnote(){
    		var count = $(this).next().next().val();
    		var note = $(this).val();
    		var usdrate = $("#todayrate").val();
    		$(this).next().next().next().val(note*count*usdrate).trigger("change");
    	})

     	$(document).on("change",".amount",function(){
    		var changetotal = 0;
    		var lis = $(".amount");
    		for (var i = 0; i < lis.length; i++){
    			changetotal += parseInt(lis[i].value);
    		}
			$("#totalchanges").html("<b>"+changetotal+"</b> npr ");
		})

    </script>
</body>
</html>