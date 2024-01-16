<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1516821-final';
    const USER = 'LAA1516821';
    const PASS = 'pass0726';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    session_start();
    $pdo = new PDO($connect,USER,PASS);
    if(isset($_POST['insert'])) {
        $login_success_url="";
        $error_message = "";
        $name = $_POST['name'];
        $png = $_POST['png'];
        $mp3 = $_POST['mp3'];
        $maker_id = $_POST['maker_id'];
        $outline = $_POST['outline'];
       
        $sql = $pdo->prepare('update Instrument set name=?,png=?,mp3=?,maker_id=?,outline=? where id=?');
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
            }else{
                $sql->execute([$name,$png,$mp3,$maker_id,$outline]);
                $login_success_url = "update3.php";
                header("Location: {$login_success_url}");
                exit;
            }
        }
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
    <div class="title"><h1>こうしん</h1>
    こうしんしたい内容を入力してね</div>
    <div class="main">
            <table>
            <tr><th>楽器番号</th><th>楽器名</th><th>画像の名前</th><th>音源の名前</th><th>メーカーID</th><th>概要</th></tr>
                <?php
                $pdo=new PDO($connect, USER, PASS);
                $sql=$pdo->prepare('select * from Instrument where id=?');
                $sql->execute([$_POST['id']]);
                foreach ($sql as $row) {
                    echo '<tr>';
                    echo '<form action="update3.php" method="post">';
                    echo '<td style="text-align:center;">';
                    echo '<input type="hidden" name="id" value="', $row['id'], '">';
                    echo $row['id'];
                    echo '</td> ';
                    echo '<td style="text-align:center;">';
                    echo '<input type="text" name="name" value="', $row['name'], '">';
                    echo '</td> ';
                    echo '<td style="text-align:center;">';
                    echo '<input type="text" name="png" value="', $row['png'], '">';
                    echo '</td> ';
                    echo '<td style="text-align:center;">';
                    echo '<input type="text" name="mp3" value="', $row['mp3'], '">';
                    echo '</td> ';
                    $sql_maker='select * from Maker';
                    $data="";

                    if($stmt=$pdo->query($sql_maker)){
                        foreach($stmt as $maker_data_val){
                            $data .="<option value='".$maker_data_val['id'];
                            $data .="'>".$maker_data_val['id']."</option>";
                        }
                    }
                    echo '<td style="text-align:center;">';
                    echo '<select name="maker_id">';
                    echo $data;
                    echo '</select>';
                    echo '</td style="text-align:center;"> ';
                    echo '<td>';
                    echo '<textarea name="outline">';
                    echo $row['outline'];
                    echo '</textarea>';
                    echo '</td> ';
                    echo '<td style="text-align:center;"><input type="submit" value="こうしん" class="button2"></td>';
                    echo '</form>';
                    echo '</tr>';
                    echo "\n";
                    }
                ?>
            </table>
            <form action="update.php" method="post">
                <input type="submit" value="せんたく画面にもどる" class="button0">
            </form>
            <div class="error">
            <?php
                    if(!empty($error_message)){
                        echo $error_message;
                    }
            ?>
            </div>
            
        </div>
</body>
</html>