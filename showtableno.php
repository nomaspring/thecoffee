      <?php
        include 'repository.php';
        $insfiles = scandir($repository."oms1/record/record/");
        $instables = str_replace(".txt", "", $insfiles);
        $tabletxt = file_get_contents($repository."oms1/record/initdata/tableno.txt");
        $tablearray = explode(",", $tabletxt);

        $occupiedtable = array_intersect($tablearray,$instables);

        $vacanttable = array_diff($tablearray, $occupiedtable);
      ?>