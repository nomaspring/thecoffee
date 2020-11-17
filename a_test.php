      <?php
        include 'repository.php';
        $insfiles = scandir($repository."oms1/record/record/");
        $instables = str_replace(".txt", "", $insfiles);
        $tabletxt = file_get_contents($repository."oms1/record/initdata/tableno.txt");
        $tablearray = explode(",", $tabletxt);

        $occupiedtable = array_intersect($tablearray,$instables);

        $vacanttable = array_diff($tablearray, $instables);


        foreach($tablearray AS $targettab){
            if (in_array($targettab, $occupiedtable)) {
                echo $targettab.' is <br>';
            }
          //   echo '<button class="tablebtn occupiedbtn" name="targettable" value="'.$targettab.'">'.$targettab.'</button>';
          //   echo $targettab.'<br>';
          //   }
          // echo '<button class="tablebtn" name="targettable" value="'.$targettab.'">'.$targettab.'</button>';
            echo "not found<br>";
        }


      ?>