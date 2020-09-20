<!doctype html>
<html>

 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>daily expenses</title>
    <link rel="stylesheet" href="../fontello-63cbc188/css/fontello.css">
    <link rel="stylesheet" href="management.css?mut=<?php echo time()?>" type="text/css" media="screen">
</head>

<body>
	<header>
		<h3>The Coffee menu manager</h3>;
	</header>

	<article>
<!-- 		<button type="button">show/hide all menu</button>
 -->        
        <form action="updatemenu.php" method="POST">
            <?php
                include 'recallmenu.php';
            ?>

            <div class="btnbox">
                <button type="button" onclick="location.href='../index.html'">home <i class="icon-home"></i></button>
                <button>save <i class="icon-floppy"></i></button>
            </div>
        </form>


	</article>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script>

    	$('button.additem').on("click", function(){
    		var catname = $(this).parent().attr('id');
    		var newno = $(".itemdetail").length+1;
			var addtext = 
			'<div class="itemdetail '+catname+' gridtable"><input type="hidden" value="'+catname+'" name="'+newno+'[category]"><input type="text" value="" name="'+newno+'[name]" placeholder="type on here...." autofocus><input type="number" value="" name="'+newno+'[price]"><input type="checkbox" value="scfree" name="'+newno+'[scfree]"><input type="checkbox" value="show" name="'+newno+'[show]" checked="checked"></div>';
			$(this).before(addtext);
    	})

		$("legend").on("click", function(){
			$(this).siblings().toggle(600);
    	})

    </script>
</body>
</html>