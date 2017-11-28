      <?php
        $insfiles = scandir("D:/OneDrive/billing/record/");
        $instables = str_replace(".txt", "", $insfiles);
        $tabletxt = file_get_contents("initdata/tableno.txt");
        $tablearray = explode(",", $tabletxt);

        $occupiedtable = array_intersect($tablearray,$instables);

        $vacanttable = array_diff($tablearray, $occupiedtable);
      ?>