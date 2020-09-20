<?php

  include 'repository.php';
  include 'showtableno.php';

  if (count($occupiedtable)>0) {
    foreach($occupiedtable AS $targettab){
      echo '<br>';
      echo '<button class="btn btntbl" value="'.$targettab.'">'.$targettab.'</button>';
      
      $orderdtl = file($repository.'oms1/record/record/'.$targettab.'.txt');

      foreach($orderdtl AS $orderitm){
        $itmdtl = explode(':', $orderitm);
        echo ' '.$itmdtl[1].' <b>'.$itmdtl[3].'</b>'.'<i class="icon-plus-circled"></i>';

      } 
    }
  }
?>