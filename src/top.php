<?php session_start();?>
<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-final';
    const USER = 'LAA1516821';
    const PASS = 'pass0726';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP</title>
</head>
<body>
    <h1>楽器図鑑</h1>
    <button onclick="location.href='insert.php'">登録</button>
    <button onclick="location.href='update.php'">更新</button>
    <button onclick="location.href='delete.php'">削除</button>
    <ul>
        <div class="main">
            <?php
                echo '<div id="column" class="column03">';
                echo '<ul>';
                $pdo= new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from Instrument');            
                foreach ($sql as $row) {
                $id=$row['id'];
                echo '<li><a href="detail.php?id=', $id, '"><img alt="image" src="../image/', $row['png'], '.png" height="240" width="260">';
                echo '<h3><a href="detail.php?id=', $id, '">', $row['name'], '</a></h3>';
            }
            echo '</ul>';
            echo '</div>';
            ?>
        </div>
    </ul> 
</body>
</html>