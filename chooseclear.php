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
      <button class="hbutton" style="vertical-align:middle" onclick="location.href='index.html';"><span>Order Management System</span></button>
    </header>

    <article>
      <p>select table to make clear :</p>
      <div class="btnbox">
        <form action="processforclearwithdc.php" method="POST">
          <?php

            include 'repository.php';
            include 'promotion/promo_info.php';

            include 'showtableno.php';
            if (count($occupiedtable)>0) {
              echo '<div class="dc">
              <p>to make '.$promorate.' off bill for '.$promotitle.', check this box first and select table</p>
              <input type="checkbox" name="dc"></div>';
              foreach($occupiedtable AS $targettab){
                echo '<button class="btn tablebtn" name="targettable" value="'.$targettab.'">'.$targettab.'</button>';
              }
            } else {
                echo '<script>alert("no bills."); location.href="index.html";</script>';
            }
          ?>
        </form>
      </div>
    </article>
  </body>
</html>
