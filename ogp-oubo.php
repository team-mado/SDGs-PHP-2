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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ogp-oubo.css" />
    <title>Document</title>
</head>

<body>
<header>
    <div class="header">
      <div><a href="ogp-ichiran.php"><img class="home-logo" src="img/home-logo.png" alt=""></a></div>
      <div><a href="php_act/logout.php"><img class="logout-bt" src="img/logout-bt.png" alt=""></a></div>
    </div>
  </header>
    <? if($oubo_counts == "0") :?>
    <p>まだ応募はまだありません</p>
    <? else:?>
    <p>現在<span id="oubo"><?= $oubo_counts ?></span> 名の応募があります！</p>
    <? endif;?>

    <? if($oubo_counts == "0") :?>

    <? else:?>
    <div id="scroll-box">
        <table class="st-tbl1">
            <thead>
                <tr>
                    <th><p>応募者名<p></th>
                    <th><p>E-mail<p></th>
                    <th><p>作品URL<p></th>
                    <th><p>リモート可否<p></th>
                </tr>
            </thead>
            <!-- <div id="scroll-box"> -->
                <tbody>
                    <?php foreach ($posts as $post) : ?>
                        
                        <?php
                    $designer_name = $post["designer_name"];
                    $designer_email = $post["designer_email"];
                    $portfolio  = $post["portfolio"];
                    $remote_availability  = $post["remote_availability"];
                    ?>
                    <tr>
                        <td>
                            <div class="scroll"><? echo "<p> $designer_name</p>" ?></div>
                        </td>
                        <td>
                            <div class="scroll"><? echo "<p> $designer_email</p>" ?></div>
                        </td>
                        <td>
                            <div class="scroll"><? echo "<p> $portfolio</p>" ?></div>
                        </td>
                        <td>
                            <div class="scroll"><? echo "<p> $remote_availability</p>" ?></div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <!-- </div> -->
            </table>
        </div>
        <? endif;?>
            <!-- <a href="ogp-update.php?id=<? echo ($id) ?>">編集ページに戻る</a> -->
            <a href="ogp-update.php?id=<? echo ($id) ?>"><img class="bt-new" src="img/1.png" alt=""></a>
        </body>
        </html>