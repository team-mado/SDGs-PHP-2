<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('php_act/functions.php');
check_session_id();




$clients_id= $_SESSION["id"];
$name = $_SESSION["staff"];


// 全件データ表示
// ---------
$pdo = connect_to_db();
$sql = "SELECT * FROM ogp_table2  where clients_id =:clients_id ORDER BY id DESC " ;


// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':clients_id', $clients_id, PDO::PARAM_INT);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();

    echo json_encode(["error_msg" => "{$error[2]}"]);
} else {
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);  
}



$pdo1 = connect_to_db();
$sql1 = "SELECT COUNT( clients_id = :clients_id ) AS project_counts FROM ogp_table2 where clients_id = :clients_id ";
$stmt1 = $pdo1->prepare($sql1);
$stmt1->bindValue(':clients_id',$clients_id, PDO::PARAM_INT);
$status1 = $stmt1->execute();


if ($status1 == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
} else {
  $posts1 = $stmt1->fetch(PDO::FETCH_ASSOC);
  $project_counts = $posts1["project_counts"];
}


?>






<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DESIGN UP! SDGs</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="css/ress.min.css" />

    <!-- Googleフォント -->

    <!-- Fon Awesome読込み -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- オリジナルcomponent.CSS -->
    <link rel="stylesheet" href="css/component.css" />
    <link rel="stylesheet" href="css/ogp-ichiran.css" />
  </head>
  <body>
    <header>
    <div class="header">
      <div><img class="home-logo" src="img/home-logo.png" alt="" ></div>
      <div><a href="php_act/logout.php"><img class="logout-bt" src="img/logout-bt.png" alt=""></a></div>
    </div>
    </header>
    <main>

      <div class="all-wrapper"></div>
<p><span><?= $name ?></span> 様ありがとうございます。<br>
現在進行中のプロジェクトは<span class="project-kensu"><?= $project_counts ?></span> 件です。</p>
<br>

<?php foreach ($posts as $post) : ?>

  <?php
$img = $post["img"];
$id = $post["id"];
?>

      <div class="ogp-ichiran-img">
      <a href="ogp-update.php?id=<?= $id ?>"><img class="ogp-img" src="<?= $img ?>" alt=""></a>
      </div>

<?php endforeach; ?>

<br>
<div class="button-box">
<a href="ogp-new.php"><img class="bt-new" src="img/bt-new.png" alt=""></a>
<br>
      </div>
      <br>
<br>
      </input>
        </form>
    </main>
  </body>
</html>
