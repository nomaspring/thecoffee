<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>promotion manager</title>
  </head>

  <body>
    <article>
      <form action="promo_change.php" method="POST">
        <?php
          include '../repository.php';
          include 'promo_info.php';

          echo "Promotion Management";
          echo '<br>';      
          echo '<br>';
          echo 'promotion title : ';
          echo '<input type="text" style=" width:300px; height:30px" name="promotitle" value="'.$promotitle.'"><br>';
          echo 'discount rate : ';
          echo '<input type="text" style=" width:300px; height:30px" name="promorate" value="'.$promorate.'"><br>';

        ?>

        <br>
        <button type="submit">confirm</button>
        <button type="button" onclick="location.href='setting/indexmenu.php'">cancel</button>
      </form>
    </article>
  </body>
</html>
