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
