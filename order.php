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
      table  : <select name="tableno" id="tableno" disabled="true">
        <option value="">Select Table No</option>
        <?php
          $tabletxt = file_get_contents("initdata/tableno.txt");
          $tablearray = explode(",", $tabletxt);
          foreach($tablearray AS $tabno) {
            if($tabno==$_POST["targettable"]){
              echo "<option value=\"{$tabno}\" selected=\"selected\">{$tabno}</option>";
            } else {
              echo "<option value=\"{$tabno}\" >{$tabno}</option>";
            }
           }
        ?>
      </select><br />

      menu : <select name="category" id="category" onchange="changecatlist();">
        <option value="">Select Category</option>
          <?php
          echo file_get_contents("initdata/catlist.txt");
          ?>
      </select>

      <select name="item" id="item">
        <option value="">Select Item</option>
      </select>
      <div class="btnbox">
        <input type="button" class="sbtn btncontinue" id="btnadd" value="Add" disabled="true"> 
      </div>
      <hr/>

      <!-- showing field for all order -->
      <form action=".\process.php" method="POST">
        Order details on table no :
        <input type="text" style="border:none" name="tabno" id="tabno" value="">
        <table>
          <thead style="background-color:peru">
            <tr>
              <td>no</td>
              <td>item</td>
              <td>q'ty</td>
              <td>edit</td>
            </tr>
          </thead>
          <tbody id="orderlist">
          </tbody>
        </table>
        <div class="btnbox">
          <input type="button" class="sbtn btnno" name="orderwork" value="Cancel" onclick="location.href='index.html'">
          <input type="submit" class="sbtn btnok" id="btndone" value="Done" disabled="true">
        </div>
      </form>
    </article>
    
    <?php
      include 'initdata/catanditems.php';
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script>

      var catanditems = <?php echo json_encode($catanditems); ?>;
      
      function changecatlist() {
        var catlist = document.getElementById("category");
        var itemlist = document.getElementById("item");
        var selcat = catlist.options[catlist.selectedIndex].value;
        while (itemlist.options.length) {
            itemlist.remove(0);
        }
        var categories = catanditems[selcat];
        if (categories) {
            var i;
            for (i = 0; i < categories.length; i++) {
                var category = new Option(categories[i], i);
                itemlist.options.add(category);
            }
            $("#item option:eq(0)").attr("selected", "selected");
            $("#btnadd").attr('disabled', false);
        }
      }

      $(document).ready(function showtabno(){
        var selection = $("#tableno option:selected").text();
        $("#tabno").val(selection);
      });

      $("#tableno").on("change", function fixtabno(){
        var selection = $("#tableno option:selected").text();
        $("#tabno").val(selection);
      });

      $("#btnadd").on("click",function insertordertolist(){
          var initno = $("#orderlist tr:last").index()+1;
          var listno = initno+1;
          var selection = $("#item option:selected").text();
          var detailready = '<tr><td>'+listno+'</td><td>'+selection+'</td><td><input type="number" name="'+selection+'" value="1" min="1"/></td><td><input type="button" class="btndel" value="delete : not ready" disabled="true"/></td></tr>';   
          $("#orderlist").append(detailready);
          $("#btndone").attr('disabled', false);
        });

      $(".btndel").on("click",function(){
        var clickedrow = $(this).parent().parent();
        var cls = clickedRow.attr("class");
        clickedrow.remove();
      });
      
    </script>
    
    <footer>
      <a href="http://www.facebook.com/thecoffeenepal">www.facebook.com/thecoffeenepal</a>
    </footer>
  </body>
</html>
