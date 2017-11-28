<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>cafe The Coffee Order Management System</title>
    <link rel="stylesheet" href="oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
  </head>

  <body>
    <header>
      <button class="hbutton" style="vertical-align:middle" onclick="location.href='/oms1/supervisor/index.html';"><span>Order Management System</span></button>
    </header>
    
    <article>
      <p>select table to edit :</p>
      <div class="btnbox">
        <form action="orderedit.php" method="POST">
          <?php
            include 'showtableno.php';
            if (count($occupiedtable)>0) {
              foreach($occupiedtable AS $targettab){
                echo "
    <button class=\"btn tablebtn\" name=\"targettable\" value=\"{$targettab}\">{$targettab}</button>";
              }
            } else {
              echo "<script>alert(\"no table to select. make new bill first.\"); location.href='index.html';</script>";
            }
          ?>
        </form>
      </div> 
    </article>
    <footer>
      <a href="http://www.facebook.com/thecoffeenepal">www.facebook.com/thecoffeenepal</a>
    </footer>
  </body>
</html>
