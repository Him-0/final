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
    <title>削除</title>
</head>
<body>
    <div class="title"><h1>さくじょ</h1></div>
    <div class="name">
        この楽器をさくじょする？
    </div>
    <table>
    <tr><th>楽器ID</th><th>楽器の名前</th><th>画像の名前</th><th>音源の名前</th><th>メーカーID</th><th>説明</th></tr>
        <?php
            $pdo=new PDO($connect, USER, PASS);
            $sql=$pdo->prepare('select * from Instrument where id=?');
            $sql->execute([$_POST['id']]);
            foreach ($sql as $row) {
                echo '<tr>';
                echo '<form action="delete3.php" method="post">';
                echo '<td>';
                echo '<input type="hidden" name="id" value="', $row['id'], '">';
                echo $row['id'];
                echo '</td> ';
                echo '<td>';
                echo '<input type="hidden" name="name" value="', $row['name'], '">';
                echo $row['name'];
                echo '</td> ';
                echo '<td>';
                echo '<input type="hidden" name="png" value="', $row['png'], '">';
                echo $row['png'];
                echo '</td> ';
                echo '<td>';
                echo '<input type="hidden" name="mp3" value="', $row['mp3'], '">';
                echo $row['mp3'];
                echo '</td> ';
                echo '<td>';
                echo ' <input type="hidden" name="maker_id" value="', $row['maker_id'], '">';
                echo $row['maker_id'];
                echo '</td> ';
                echo '<td>';
                echo ' <input type="hidden" name="outline" value="', $row['outline'], '">';
                echo $row['outline'];
                echo '</td> ';
                echo '<td><input type="submit" value="削除" class="button3"></td>';
                echo '</form>';
                echo '</tr>';
                echo "\n";
            }
        ?>
    </table>
    <form action="delete.php" method="post">
        <input type="submit" value="せんたく画面にもどる" class="button2">
    </form>
    <form action="top.php" method="post">
        <input type="submit" value="トップにもどる" class="button2">
    </form>
</body>
</html>