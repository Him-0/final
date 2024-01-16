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
    <title>DETAIL</title>
</head>
<body>
    <?php
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from Instrument where id=?');
        $sql->execute([$_GET['id']]);
        foreach ($sql as $row) {
            echo '<div class="img">';
            echo '<img src="../image/', $row['png'], '.png" alt="Image" height="240" width="260"></div>';
            echo '<div class="item">';
            echo '<h1>', $row['name'], '</h1>';
            echo '<p>説明：',$row['outline'],'</p>';
            echo '<p>メーカーID：',$row['maker_id'],'</p>';
            echo '<p>どんな音？:<br> <audio controls> <source src="../sound/',$row['mp3'],'.mp3"> </audio>';
            // echo '<input type="hidden" name="id" value="', $row['id'], '">';
            // echo '<input type="hidden" name="name" value="', $row['name'], '">';
            // echo '<input type="hidden" name="maker_id" value="', $row['maker_id'], '">';
            // echo '<input type="hidden" name="outline" value="', $row['outline'], '">';
        }
    ?>
    <form action="top.php" method="post">
        <input type="submit" value="トップにもどる" class="button2">
    </form>
    <!-- <audio controls>
        <source src="../sound/violin.mp3">
    </audio> -->
</body>
</html>