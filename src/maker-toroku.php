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
            $id = $_POST['id'];
            $name = $_POST['name'];
           
            $sql = $pdo->prepare('insert into Maker(id,name) value (?,?)');
                if(empty($id)){
                    $error_message = 'IDを入力してね';
                }else if(empty($name)){
                    $error_message = 'メーカーの名前を入力してね';
                }else{
                    $sql->execute([$id,$name]);
                    $login_success_url = "mt-fin.php?id=".$id;
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
    <title>メーカーとうろく</title>
</head>
<body>
    <h1>メーカーをふやす</h1>
    <div class="main">

        <form action="maker-toroku.php" method="post">
        <div class="toroku">
            メーカーID：<input type="text"  class="text" name="id" style="width: 300px; height=30px"><br><br>
            メーカーの名前：<input type="text"  class="text" name="name" style="width: 300px; height=30px"><br><br>
            <input type="submit" name="insert" value="とうろく" class="button">
        </div>
        </form>
    <div class="error">
    <?php
            if(!empty($error_message)){
                echo $error_message;
            }
    ?>
    <form action="maker.php" method="post">
        <input type="submit" value="メーカーいちらんにもどる" class="button2">
    </form>
    </div>
    </div>
</body>
</html>