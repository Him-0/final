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
    <link rel="stylesheet" href="../css/frame.css">
    <title>TOP</title>
</head>
<style>
    #column ul {
	width: calc(100 + 20px);
	margin: 0 -10px;
	display: flex;
	flex-wrap: wrap;
}

#column li {
	padding: 10px 10px 20px 30px;
    list-style: none;
    width: 250px;
    overflow: hidden;
    float:left;
    height:400px;

}

#column li a,
#column li a:visited {
	text-decoration: none;
	color: #111;
}

#column li p {
	font-size: 90%;
	margin-bottom: 3px;
}

#column li span {
	font-size: 90%;
	display: block;
}

.column04 li {
	width: calc(25% - 20px);
}
 
    #column img{
        border-radius:10px;
    }
</style>
<body>
    <div class="title"><h1>がっきずかん</h1></div>
    <div class="buttons">
        <button onclick="location.href='insert.php'" class="bigger">とうろく</button>
        <button onclick="location.href='update.php'" class="bigger">こうしん</button>
        <button onclick="location.href='delete.php'" class="bigger">さくじょ</button>
        <button onclick="location.href='maker.php'" class="bigger">メーカー</button>
    </div>
    <ul>
        <div class="main">
            <?php
                echo '<div id="column" class="column03">';
                $pdo= new PDO($connect,USER,PASS);
                $sql=$pdo->query('select * from Instrument');            
                foreach ($sql as $row) {
                $id=$row['id'];
                echo '<li><a href="detail.php?id=', $id, '"><img alt="image" src="../image/', $row['png'], '.png" height="240" width="260">';
                echo '<h3><a href="detail.php?id=', $id, '">', $row['name'], '</a></h3></li>';
            }
            echo '</div>';
            ?>
        </div>
    </ul> 
</body>
</html>