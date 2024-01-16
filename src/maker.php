<?php session_start();?>
<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-final';
    const USER = 'LAA1516821';
    const PASS = 'pass0726';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/frame.css">
    <title>MAKER</title>
</head>
<body>
    <div class="title"><h1>メーカーいちらん</h1></div>
    <?php
        $pdo=new PDO($connect, USER, PASS);
        echo '<table id="maker">';
        echo '<tr><th>メーカーID（アイディー）</th><th>メーカー名</th></tr>';
        foreach($pdo->query('select * from Maker') as $row){
            echo '<tr>';
            echo '<td style="text-align:center;">',$row['id'],'</td>';
            echo '<td style="text-align:center;">',$row['name'],'</td>';
            echo '</tr>';
            echo "\n";
        }
        echo '</table>';
    ?>
    <button class="button" onclick="location.href='maker-toroku.php'">メーカーをふやす</button>
    <form action="top.php" method="post">
        <input type="submit" value="トップにもどる" class="button4">
    </form>
</body>
</html>