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
    <title>登録完了</title>
</head>
<body>
    <div class="title">
    <h1>とうろくが完了したよ！</h1>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $id=$pdo->query('select max(id) from Instrument')->fetchColumn();
        $sql=$pdo->prepare('select * from Instrument where id=?');
        $sql->execute([$id]);
        echo '<table>';
        echo '<tr><th>楽器番号</th><th>楽器名</th><th>画像の名前</th><th>音源の名前</th><th>メーカーID</th><th>概要</th></tr>';
        foreach($sql as $row){
            echo '<tr>';
            echo '<td style="text-align:center;">',$row['id'],'</td>';
            echo '<td style="text-align:center;">',$row['name'],'</td>';
            echo '<td style="text-align:center;">',$row['png'],'</td>';
            echo '<td style="text-align:center;">',$row['mp3'],'</td>';
            echo '<td style="text-align:center;">',$row['maker_id'],'</td>';
            echo '<td style="text-align:center;">',$row['outline'],'</td>';
            echo '</tr>';
            echo "\n";
        }
        echo '</table>';
    ?>
    </div>
    <form action="top.php" method="post">
        <input type="submit" value="トップにもどる" class="button2">
    </form>
</body>
</html>