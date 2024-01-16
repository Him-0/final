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
    <title>更新</title>
</head>
<style>
    .frame{
            position:relative;
        }
</style>
<body>
    <div class="title"><h1>こうしん</h1>
        こうしんしたい楽器をえらんでね
    </div>
    <?php
        $pdo=new PDO($connect, USER, PASS);
        foreach($pdo->query('select * from Instrument') as $row){
            echo '<div class="frame">';
            echo '<p><img alt="image" src="../image/', $row['png'], '.png" height="150" width="170"></p>';
            echo '<div class="detail">';
            echo '<p>','楽器ID：',$row['id'],'</p>';
            echo '<p>','楽器の名前：',$row['name'],'</p>';
            echo '<p>','画像の名前：',$row['png'],'</p>';
            echo '<p>','音源の名前：',$row['mp3'],'</p>';
            echo '<p>','メーカーID：',$row['maker_id'],'</p>';
            echo '<p>','説明：',$row['outline'],'</p>';
            echo '<form action="update2.php" method="post">';
            echo '<input type="hidden" name="id" value="',$row['id'],'">';
            echo '<button type="submit" class="button2">こうしん</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
    ?>
    <form action="top.php" method="post">
        <input type="submit" value="トップにもどる" class="button4">
    </form>
</body>
</html>