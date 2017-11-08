<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>cafe The Coffee Order Management System</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
    <style>
      .btn {
        border: none;
        background: #ddd;
        padding: 50px 28px;
        cursor: pointer;
      }
      .btn:hover {
        background: #0b7dda;
        color: white;
      }
      .table {
        border: none;
        background: #ddd;
        padding: 10px 20px;
        margin:3px;
      }

    </style>
  </head>

  <body id="body">
  
    <header>
        <h2><a href="index.html">Order Management System</a></h2>
    </header>

    <section>
    <div id="vacant">
      <p>Select New Table</p>
      <form action="order.php" method="POST">
        <?php
          include 'showtableno.php';
          foreach($vacanttable AS $targettab){
                echo "
<button class=\"btn table\" name=\"targettable\" value=\"{$targettab}\">{$targettab}</button>";
              }
        ?>
      </form>
    </div>
    </section>
  </body>
  <footer>
    <a href="http://www.facebook.com/thecoffeenepal">www.facebook.com/thecoffeenepal</a>
  </footer>
</html>
