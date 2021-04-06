<?
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('php_act/functions.php');

// $clients_id = $_SESSION["id"];

// var_dump($_GET["id"]);
// exit;

// 初期画面/
// if(!isset($_GET["id"])){
//   $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:　,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png";
// }

$id = 158;

// OGP編集時にID取得
// if(isset($_GET["id"])){
//   $id = $_GET["id"];
// }

// すでにOGPを作成しているときはデータが入っている状態
// if(isset($_GET["id"])){

$pdo = connect_to_db();
$sql = "SELECT * FROM ogp_table2 where id = :id";
// var_dump($sql);
// exit;
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $post = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $post["id"];
  $clients_id= $post["clients_id"];
  $img = $post["img"];
  $color_check = $post["color_check"];
  $project_title = $post["project_title"];
  $job_category = $post["job_category"];
  $project_overview = $post["project_overview"];
  $project_detail = $post["project_detail"];
  $production_period = $post["production_period"];
  $remote_availability = $post["remote_availability"];
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
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />

  <!-- Googleフォント -->

  <!-- Fon Awesome読込み -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  <!-- オリジナルcomponent.CSS -->
  <link rel="stylesheet" href="css/component.css" />
  <link rel="stylesheet" href="css/ogp-syosai.css" />
</head>

<body>
  <header>
    <div class="header">
      <div><a href="index.php"><img class="home-logo" src="<?  ?>" alt="" /></a></div>
    </div>
  </header>

  <main>
    <div class="ogp-box">
      <img src="<? echo($img) ?>" alt="">
      <br>
<div class="remote-box">

      <div class="tab">
        <p><? echo($remote_availability) ?></p>
      </div>
      <p>　 | 　</p><p>期限：<? echo($production_period) ?></p>

</div>
      <div>
        <p class="project-text1"><? echo($project_overview) ?></p>
        <p class="project-text2"><? echo($project_detail) ?></p><br>
        <br>
        <div class="sdgs17-box">
          <p>このプロジェクトはSDGｓ17の目標の</p><br>
          <div class="ul-box">
            <ul>
              <li><img src="img/1.png" alt="">
                <p> 貧困をなくそう</p>
              </li>
              <li><img src="img/1.png" alt="">
                <p> 貧困をなくそう</p>
              </li>
              <li><img src="img/1.png" alt="">
                <p> 貧困をなくそう</p>
              </li>
            </ul>
          </div><br>
          <p class="sdgs-text">に該当します。</p>
        </div>
        <br>

      </div>
      <div>

      </div>
    </div>

    <br>
   
    <p class="mini-text">ご興味がある方は、こちらからご応募ください</p><br>
    <br>
    <h1>デザイナー応募フォーム</h1>

    <div class="form-box">
      <form action="" method="post" class="row">
        <label for="GET-name">お名前</label><br>
        <input class="form-style" id="GET-name" type="text" name="designer_name" value="テストユーザ"/>

        <label for="GET-name">E-mail</label><br>
        <input class="form-style" id="GET-name" type="text" name="designer_email" value="E-mail"/>

        <label for="GET-name">作品URL</label><br>
        <input class="form-style" id="GET-name" type="text" name="portfolio" value="作品URL" />

        <label for="GET-name">
          <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート可" checked/>リモート可　
          <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート不可" />不可</label><br>

        <br>

        <div class="center">
          <a href="hanasi.php">
          <img  class="bt-kuwashiku" src="img/bt-kuwashiku.png" alt="">
          </a>
        </div>
        <br>
        <br>
        </input>
      </form>
    </div>

  </main>
</body>

</html>