<?php

    $pf = file($repository.'oms1/record/initdata/promotion.txt') or die('no promo');
    $promotitle = $pf[0];
    $promorate = $pf[1];
    $dcrate = (int)$promorate/100;
?>