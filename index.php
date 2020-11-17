<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>cafe The Coffee Billing System</title>
  <link rel="stylesheet" href="oms.css?mut=<?php echo time()?>" type="text/css" media="screen">
  <link rel="stylesheet" href="fontello-63cbc188/css/fontello.css">
  <link rel="shortcut icon" href="images/icon114.png">
</head>

<body>

  <header>
    <button class="hbutton" style="vertical-align:middle" onclick="location.href='index.php';"><span>Billing System</span></button>
  </header>

  <article>
    <div class="titleWrapper">      
      <div>
        <div class="title">Select Table</div>

        <div class="btnbox">

          <form action="processforclearwithdc.php" method="POST">
            <?php
              include 'showtableno.php';
              foreach($occupiedtable AS $targettab){
                echo '<button class="tablebtn occupiedbtn" name="targettable" value="'.$targettab.'">'.$targettab.'</button>';
              }
            ?>
          </form>
          <form action="order.php" method="POST">
            <?php
              foreach($vacanttable AS $targettab){
                echo '<button class="tablebtn" name="targettable" value="'.$targettab.'">'.$targettab.'</button>';
              }
            ?>
          </form>
        </div>
      </div>

      <div>
        <div class="title">management</div>

        <div class="btnbox">
          <button class="sbtn btncontinue btnccl" onclick="location.href='actworkers.php'">close yesterday</button>
          <button class="sbtn btncontinue btnccl" onclick="location.href='inquiry/todayssales.php'">today's total</button>
          <button class="sbtn btncontinue btnccl" onclick="location.href='setting/indexForPreference.php'">setting&#13;<i class="icon-cog"></i></button>
        </div>

      </div>
    </div>

    <?php include_once("showtableorders.php"); ?>

  </article>
</body>

</html>
