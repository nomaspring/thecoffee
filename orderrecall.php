<?php
  $filePath = "record/{$_POST['targettable']}.txt";
  $lines = file($filePath);
  foreach($lines AS $line) {
    $eachorder = explode(":", $line);
    echo "<tr><td>".$eachorder[0]."</td><td>".$eachorder[1]."</td><td><input type=\"number\" name=\"".$eachorder[1]."\" value=\"".$eachorder[3]."\" min=\"1\" style=\"width:3em; border:none;\"/></td><td><input type=\"button\" class=\"btndel\" value=\"delete\"/></td></tr>";
  }
?>