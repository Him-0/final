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
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('delete from Instrument where id=?');
        if($sql->execute([$_POST['id']])){
            echo '<h1>削除に成功しました。</h1>';
        }else{
            echo '<h1>削除に失敗しました。</h1>';
        }
    ?>
    <form action="top.php" method="post">
        <input type="submit" value="トップにもどる" class="button2">
    </form>
</body>
</html>