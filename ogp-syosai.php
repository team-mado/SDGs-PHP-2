<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('php_act/functions.php');


$id = $_GET["id"];


$pdo = connect_to_db();
$sql = "SELECT * FROM ogp_table2 where id = :id";

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
  $clients_id = $post["clients_id"];
  $img = $post["img"];
  $color_check = $post["color_check"];
  $colors = explode(" ", $color_check);
  $colors = array_filter($colors, 'strlen');


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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="https://lively-miyakonojo-7603.lolipop.io/ogp-syosai.php?<? echo($id) ?>">
  <meta name="twitter:image" content="<? echo($img)?>">
  <meta name="twitter:title" content="<? echo($project_overview)?>">
  <meta name="twitter:description" content="<? echo($project_detail) ?>">
  <title>DESIGN UP! SDGs</title>

  <!-- リセットCSS -->
  <link rel="stylesheet" href="css/ress.min.css" />

  <!-- Googleフォント -->

  <!-- Fon Awesome読込み -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  <!-- オリジナルcomponent.CSS -->
  <link rel="stylesheet" href="css/component.css" />
  <link rel="stylesheet" href="css/ogp-syosai.css" />
</head>

<body>

  <div class="header">
    <div><a href="ogp-ichiran.php"><img class="home-logo" src="img/home-logo.png" alt=""></a></div>
  </div>

<br>
  <main>
    <div class="ogp-box">
      <img src="<? echo($img) ?>" alt="">
      <br>
      <div class="remote-box">

        <div class="tab">
          <p>
            <? echo($remote_availability) ?>
          </p>
        </div>
        <p>　 | 　</p>
        <p>制作期限：
          <? echo($production_period) ?>
        </p>

      </div>
      <div>
        <p class="project-text1">
          <? echo($project_overview) ?>
        </p>
        <p class="project-text2">
          <? echo($project_detail) ?>
        </p><br>
        <br>
        <div class="sdgs17-box">
          <p>このプロジェクトはSDGｓ17の目標の</p><br>
          <div class="ul-box">
            <ul>

              <?php foreach ($colors as $value) : ?>

                <? $color   = $value; ?>

                <?php if ($color == 1) : ?>
                  <li><img src="img/1.png" alt="">
                    <p> 貧困をなくそう</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 2) : ?>
                  <li><img src="img/2.png" alt="">
                    <p>飢餓をゼロに</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 3) : ?>
                  <li><img src="img/3.png" alt="">
                    <p>全ての人に健康と福祉を</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 4) : ?>
                  <li><img src="img/4.png" alt="">
                    <p>質の高い教育をみんなに</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 5) : ?>
                  <li><img src="img/5.png" alt="">
                    <p>ジェンダー平等を実現しよう</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 6) : ?>
                  <li><img src="img/6.png" alt="">
                    <p>安全な水とトイレを世界中に</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 7) : ?>
                  <li><img src="img/7.png" alt="">
                    <p>エネルギーをみんなにそしてクリーンに</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 8) : ?>
                  <li><img src="img/8.png" alt="">
                    <p>働きがいも経済成長も</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 9) : ?>
                  <li><img src="img/9.png" alt="">
                    <p>産業と技術革新の基盤をつくろう</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 10) : ?>
                  <li><img src="img/10.png" alt="">
                    <p>人や国の不平等をなくそう</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 11) : ?>
                  <li><img src="img/11.png" alt="">
                    <p>住み続けられる街づくりを</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 12) : ?>
                  <li><img src="img/12.png" alt="">
                    <p>つくる責任つかう責任</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 13) : ?>
                  <li><img src="img/13.png" alt="">
                    <p>気候変動に具体的な対策を</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 14) : ?>
                  <li><img src="img/14.png" alt="">
                    <p>海の豊かさを守ろう</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 15) : ?>
                  <li><img src="img/15.png" alt="">
                    <p>陸の豊かさも守ろう</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 16) : ?>
                  <li><img src="img/16.png" alt="">
                    <p>平和と公正を全ての人に</p>
                  </li>
                <?php endif; ?>
                <?php if ($color == 17) : ?>
                  <li><img src="img/17.png" alt="">
                    <p>パートナーシップで目標を達成しよう</p>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
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
    <p class="mini-text">ご興味がある方はこちらからご応募ください</p><br>
    <br>
    <h1>デザイナー応募フォーム</h1>
    <div class="form-box">
      <p class="hissu">* 必須項目
      </p>

      <form action="php_act/syosai_recruiting_act.php" method="post" class="row">
        <label for="GET-designer_name">お名前</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-designer_name" type="text" name="designer_name" placeholder="例）山田太郎 " value="test太郎" required />

        <label for="GET-designer_email">E-mail</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-designer_email" type="email" name="designer_email" placeholder="例）sample@example.com" value="testtarou@gmail.com" required />

        <label for="GET-portfolio">作品URL</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-portfolio" type="url" name="portfolio" placeholder="例）https://lively-miyakonojo-7603.lolipop.io" value="https://testtarou.co.jp" required />

        <label for="GET-remote_availability">リモート対応<span class="hissu"> *　</span>
          <input class="form" id="GET-remote_availability" type="radio" name="remote_availability" value="リモート可" checked />可　
          <input class="form" id="GET-remote_availability" type="radio" name="remote_availability" value="リモート不可" />不可</label><br>
        <br>
        <input type="hidden" name="id" value="<? echo($id) ?>">
        <div class="center">
          <button>
            <!-- <a href="hanasi.php"> -->
            <img class="bt-kuwashiku" src="img/bt-kuwashiku.png" alt="">
          </button>
          <!-- </a> -->
        </div>
        <br>
        <br>
        </input>
      </form>
    </div>
  </main>
</body>
</html>