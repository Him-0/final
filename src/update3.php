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
<body>
    <h1>こうしんが完了したよ！</h1>
    <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql = $pdo->prepare('insert into Instrument(name,png,mp3,maker_id,outline) value (?,?,?,?,?)');
                if(empty($name)){
                    $error_message = '楽器名を入力してください';
                }else if(empty($png)){
                    $error_message = '画像の名前を入力してください';
                }else if(empty($mp3)){
                    $error_message = '音源の名前を入力してください';
                // }else if(empty($maker_id)){
                //     $error_message = 'メーカーIDを入力してください';
                }else if(empty($outline)){
                    $error_message = '楽器の説明を入力してください';
                }else if($sql->execute([$_POST['name'],$_POST['png'],$_POST['mp3'],$_POST['maker_id'],$_POST['outline'],$_POST['id']])){
                    echo '更新が完了しました';
                }else{
                    echo '更新に失敗しました';
                }
            ?>
            <br><hr><br>
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
                <form action="top.php" method="post">
                    <input type="submit" value="トップにもどる" class="button2">
                 </form>
</body>
</html>