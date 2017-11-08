<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>cafe The Coffee Order Management System</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
    <style media="screen">
    </style>
  </head>
  <body id="body">
    <header>
        <h2><a href="index.html">Order Management System</a></h1>
    </header>

    <div id="content">
      <article>

        Select table no : <select name="tableno" id="tableno">
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

        Select menu  : <select name="category" id="category" onchange="changecatlist();">
          <option value="">Select Category</option>
            <?php
            echo file_get_contents("initdata/catlist.txt");
            ?>
        </select>

        <select name="item" id="item">
          <option value="">Select Item</option>
        </select>
        <input type="button" id="btnadd" value="Add">
        <br/>
        <hr/>


        <!-- showing field for all order -->
        <form action=".\processforedit.php" method="POST">
          Order details on table no :
          <input type="hidden" name="pretable" value="<?php echo $_POST['targettable']; ?>">
          <input type="text" style="border:none" name="tabno" id="tabno" value="">

          <div class="billfield";">
            <table border-style="ridge" width="400">
              <thead style="background-color:peru">
                <tr>
                  <td>no</td>
                  <td>item</td>
                  <td>q'ty</td>
                  <td>edit</td>
                </tr>
              </thead>
              <tbody id="orderlist">
                <?php
                  include 'orderrecall.php';
                ?>
                
              </tbody>
            </table>
          </div>


          <input type="button" name="orderwork" value="Cancel" onclick="location.href='index.html'">
          <input type="submit" value="Done">
        </form>
      </article>
    </div>
    
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
        var detailready = '<tr><td>'+listno+'</td><td>'+selection+'</td><td><input type="number" name="'+selection+'" value="1" min="1" style="width:3em; border:none;"/></td><td><input type="button" class="btndel" value="delete"/></td></tr>';   
        $("#orderlist").append(detailready);
        // $("#category option:eq(0)").prop("selected", true);
      });

      $(".btndel").live("click",function(){
       var clickedrow = $(this).parent().parent();
       clickedrow.remove();
      });
      
    </script>
    
  </body>
  <footer>
    <a href="http://www.facebook.com/thecoffeenepal">www.facebook.com/thecoffeenepal</a>
  </footer>
</html>
