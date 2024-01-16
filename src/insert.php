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
                }else{
                    $sql->execute([$name,$png,$mp3,$maker_id,$outline]);
                    $login_success_url = "insert-fin.php";
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
    <title>登録</title>
</head>
<body>
    <div class="title"><h1>とうろく</h1></div>
    <div class="main">

        <form action="insert.php" method="post">
        <div class="toroku">
            楽器名：<input type="text"  class="text" name="name" style="width: 300px; height=30px"><br><br>
            画像の名前：<input type="text"  class="text" name="png" style="width: 300px; height=30px"><br><br>
            音源の名前：<input type="text" class="text" name="mp3" style="width: 200px; height=30px"><br>
            メーカーID：
            <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql='select * from Maker';
                $data="";

                if($stmt=$pdo->query($sql)){
                    foreach($stmt as $maker_data_val){
                        $data .="<option value='".$maker_data_val['id'];
                        $data .="'>".$maker_data_val['id']."</option>";
                    }
                }
                echo '<select name="maker_id">';
                echo $data;
                echo '</select><br>';
            ?>
            概要：<textarea name="outline" cols="50" rows="4"></textarea><br>
            <input type="submit" name="insert" value="とうろく" class="button">
        </div>
        </form>
    <div class="error">
    <?php
            if(!empty($error_message)){
                echo $error_message;
            }
    ?>
    <form action="top.php" method="post">
        <input type="submit" value="トップにもどる" class="button4">
    </form>
    </div>
    </div>
</body>
</html>