<?php

  include '../repository.php';

  $pf = fopen($repository.'oms1/record/initdata/promotion.txt', "w");
  
  fwrite($pf, $_POST['promotitle']);
  fwrite($pf, "\n");
  fwrite($pf, $_POST['promorate']);

  fclose($pf);

  header('Location: indexForPreference.php');

?>