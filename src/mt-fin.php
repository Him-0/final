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
    <title>メーカーとうろく</title>
</head>
<body>
    <div class="title"><h1>とうろくが完了したよ！</h1></div>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from Maker where id=?');
        $sql->execute([$_GET['id']]);
        echo '<table>';
        echo '<tr><th>メーカーID</th><th>メーカーの名前</th></tr>';
        foreach($sql as $row){
            echo '<tr>';
            echo '<td style="text-align:center;">',$row['id'],'</td>';
            echo '<td style="text-align:center;">',$row['name'],'</td>';
            echo '</tr>';
            echo "\n";
        }
        echo '</table>';
    ?>
    <form action="top.php" method="post">
        <input type="submit" value="トップにもどる" class="button2">
    </form>
    <form action="maker.php" method="post">
        <input type="submit" value="メーカーいちらんにもどる" class="button2">
    </form>
</body>
</html>