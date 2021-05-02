<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('php_act/functions.php');
check_session_id();


$id = $_GET["id"];  //ogpのid



// 全件データ表示
// ---------
$pdo = connect_to_db();
$sql = "SELECT * FROM designer_table where ogp_id =:id ORDER BY ogp_id ASC ";    //応募者順に表示

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
    $error = $stmt->errorInfo();

    echo json_encode(["error_msg" => "{$error[2]}"]);
} else {
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



$pdo1 = connect_to_db();
$sql1 = "SELECT COUNT( ogp_id = :id ) AS oubo_counts FROM designer_table where ogp_id = :id";
$stmt1 = $pdo1->prepare($sql1);
$stmt1->bindValue(':id', $id, PDO::PARAM_INT);
$status1 = $stmt1->execute();


if ($status1 == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
} else {
    $posts1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    $oubo_counts = $posts1["oubo_counts"];
}

?>


<?php foreach ($posts as $post) : ?>

    <?
    $designer_name = $post["designer_name"];
    $designer_email = $post["designer_email"];
    $portfolio  = $post["portfolio"];
    $remote_availability  = $post["remote_availability"];
    ?>


<?php endforeach; ?>







<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ogp-oubo.css" />
    <title>DESIGN UP! SDGs</title>
    <!-- リセットCSS -->
    <link rel="stylesheet" href="css/ress.min.css" />

    <!-- Fon Awesome読込み -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- オリジナルcomponent.CSS -->
    <link rel="stylesheet" href="css/component.css" />
    <link rel="stylesheet" href="css/ogp-oubo.css" />
  </head>

<body>
<header>
    <div class="header">
      <div><a href="ogp-ichiran.php"><img class="home-logo" src="img/home-logo.png" alt=""></a></div>
      <div><a href="php_act/logout.php"><img class="logout-bt" src="img/logout-bt.png" alt=""></a></div>
    </div>
  </header>
  <br>
    <? if($oubo_counts == "0") :?>
    <p>まだ応募はありません</p>
    <? else:?>
    <p>現在 <span id="oubo"><?= $oubo_counts ?></span> 名の応募があります</p>
    <? endif;?>

    <? if($oubo_counts == "0") :?>

    <? else:?>
        <br>
                    <?php foreach ($posts as $post) : ?>
                        
                        <?php
                    $designer_name = $post["designer_name"];
                    $designer_email = $post["designer_email"];
                    $portfolio  = $post["portfolio"];
                    $remote_availability  = $post["remote_availability"];
                    ?>

            <div class="oubo-data">
                <ul>
                <!-- <li><span>お名前:</span><? echo($designer_name) ?><br></li> -->
                <li><? echo($designer_name) ?><br></li>
                <!-- <li><span>メール:</span><? echo($designer_email) ?><br></li> -->
                <li><? echo($designer_email) ?><br></li>
                <!-- <li><span>作品URL:</span><? echo($portfolio) ?><br></li> -->
                <li><? echo($portfolio) ?><br></li>
                <!-- <li><span>リモート:</span><? echo($remote_availability) ?><br></li> -->
                <li><? echo($remote_availability) ?><br></li>
                </ul>
            </div>
            <br>

                    <?php endforeach; ?>

        <? endif;?>
            <!-- <a href="ogp-update.php?id=<? echo ($id) ?>">編集ページに戻る</a> -->
            <div class="button-box">
            <a href="ogp-update.php?id=<? echo ($id) ?>"><img class="bt-new" src="img/hensyu-back-bt.png" alt=""></a>
      </div>

        </body>
        </html>