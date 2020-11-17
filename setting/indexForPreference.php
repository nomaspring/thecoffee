<!DOCTYPE html>
<html lang="ko">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>cafe The Coffee Billing System</title>
    <link rel="stylesheet" href="indexForPreference.css?mut=<?php echo time()?>" type="text/css" media="screen">
</head>
<body>
    <div class="gridLayOut">
        <div class= "indexmenu">
            <ul>
                <li><a href="indexForPreference.php">Preferences</li>
                <li><a href="indexForPreference.php?id=menu_list">menu list</a></li>
                <li><a href="indexForPreference.php?id=table_list">table list</a></li>
                <li><a href="indexForPreference.php?id=bill_info">bill info</a></li>
                <li><a href="indexForPreference.php?id=biz_setting">biz setting</a></li>
                <li><a href="indexForPreference.php?id=hr_manager">hr manager</a></li>
                <li><a href="indexForPreference.php?id=promotion">promotion</a></li>
            </ul>
        </div>
        
        <div class= "contents">
            <div>
                <h2>
                    <?php
                    if (isset($_GET['id'])) {
                        echo $_GET['id'];
                    } else {
                        echo 'Set preferences on left taps';

                    }
                    ?>
                </h2>
            </div>
            <div>
                <?php
                    $fileText = file($_GET["id"].".txt");
                    foreach ($fileText as $key) {
                        echo $key.'<br>';
                    }
                ?>
            </div>
            <div class="btnbox">
                <button class="button buttonblack" onclick="location.href='<? echo $_GET['id'] ?>.php'">
                    <?php
                        echo 'go '.$_GET['id'];
                    ?>
                </button>
            </div>
        </div>
        
    </div>

</body>
</html>