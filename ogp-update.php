<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('php_act/functions.php');
check_session_id();



// 初期画面/
if (!isset($_GET["id"])) {
  $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_35_bold:　,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png";
}

// OGP編集時にID取得
if (isset($_GET["id"])) {
  $id = $_GET["id"];
}

// すでにOGPを作成しているときはデータが入っている状態
if (isset($_GET["id"])) {

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
    $clients_id = $post["clients_id"];
    $img = $post["img"];
    $color_check = $post["color_check"];
    $project_title = $post["project_title"];
    $job_category = $post["job_category"];
    $project_overview = $post["project_overview"];
    $project_detail = $post["project_detail"];
    $production_period = $post["production_period"];
    $remote_availability = $post["remote_availability"];


    $color_arry = explode("  ", $color_check);
    $color1 = $color_arry[0];
    $color2 = $color_arry[1];
    $color3 = $color_arry[2];
    $color4 = $color_arry[3];
    $color5 = $color_arry[4];
    $color6 = $color_arry[5];
    $color7 = $color_arry[6];
    $color8 = $color_arry[7];
    $color9 = $color_arry[8];
    $color10 = $color_arry[9];
    $color11 = $color_arry[10];
    $color12 = $color_arry[11];
    $color13 = $color_arry[12];
    $color14 = $color_arry[13];
    $color15 = $color_arry[14];
    $color16 = $color_arry[15];
    $color17 = $color_arry[16];

    $color1  = preg_replace("/( | )/", "", $color1);
    $color2  = preg_replace("/( | )/", "", $color2);
    $color3  = preg_replace("/( | )/", "", $color3);
    $color4  = preg_replace("/( | )/", "", $color4);
    $color5  = preg_replace("/( | )/", "", $color5);
    $color6  = preg_replace("/( | )/", "", $color6);
    $color7  = preg_replace("/( | )/", "", $color7);
    $color8  = preg_replace("/( | )/", "", $color8);
    $color9  = preg_replace("/( | )/", "", $color9);
    $color10  = preg_replace("/( | )/", "", $color10);
    $color11  = preg_replace("/( | )/", "", $color11);
    $color12  = preg_replace("/( | )/", "", $color12);
    $color13  = preg_replace("/( | )/", "", $color13);
    $color14  = preg_replace("/( | )/", "", $color14);
    $color15  = preg_replace("/( | )/", "", $color15);
    $color16  = preg_replace("/( | )/", "", $color16);
    $color17  = preg_replace("/( | )/", "", $color17);


    $work_arry = explode("||", $job_category);
    $work0 = $work_arry[0];
    $work1 = $work_arry[1];
    $work2 = $work_arry[2];

    $work0  = preg_replace("/( | )/", "", $work0);
    $work1  = preg_replace("/( | )/", "", $work1);
    $work2  = preg_replace("/( | )/", "", $work2);

    $remote_availability = preg_replace("/( | )/", "", $remote_availability);
  }
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
  <link href="https://unpkg.com/ress/dist/ress.min.css" rel="stylesheet" />

  <!-- Googleフォント -->

  <!-- Fon Awesome読込み -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  <!-- オリジナルcomponent.CSS -->
  <link rel="stylesheet" href="css/component.css" />
  <link rel="stylesheet" href="css/ogp-new.css" />
</head>

<body>
  <header>
    <div class="header">
      <div><a href="ogp-ichiran.php"><img class="home-logo" src="img/home-logo.png" alt=""></a></div>
      <div><img class="logout-bt" src="img/logout-bt.png" alt=""></a></div>
    </div>
  </header>
  <main>
    <div class="gray-box">
      <img class="ogp-img" src="<? echo($img) ?>" alt="">
      <!-- <p>
        下記のフォームを全て入力いただくと<br />
        こちらの枠内に自動でバナーが生成されます
      </p> -->
    </div>
    <p>SDGｓ17の目標の中から、該当する項目を選んでください ※複数選択可</p>
    <br>
    <div class="checkbox-center">
      <div>
        <form action="php_act/ogp_update_act.php?id=<? echo($id) ?>" method="post">
          <ul>
            <li><img src="img/1.png" alt="">
              <? if($color1 == "1" ||  $color2 == "1"  ||  $color3 == "1"  ||  $color4 == "1"  ||  $color5 == "1"  ||  $color6 == "1"  ||  $color7 == "1"  ||  $color8 == "1"  ||  $color9 == "1"  ||  $color10 == "1"  ||  $color11 == "1"  ||  $color12 == "1"  ||  $color13 == "1"  ||  $color14 == "1"  ||  $color15 == "1"  ||  $color16 == "1"  ||  $color17 == "1") :?>
              <div><input type="checkbox" name="color_check[]" value="1" checked> 貧困をなくそう</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="1"> 貧困をなくそう</div>
              <? endif;?>
            </li>
            <li><img src="img/2.png" alt="">
              <? if($color1 == "2" ||  $color2 == "2"  ||  $color3 == "2"  ||  $color4 == "2"  ||  $color5 == "2"  ||  $color6 == "2"  ||  $color7 == "2"  ||  $color8 == "2"  ||  $color9 == "2"  ||  $color10 == "2"  ||  $color11 == "2"  ||  $color12 == "2"  ||  $color13 == "2"  ||  $color14 == "2"  ||  $color15 == "2"  ||  $color16 == "2"  ||  $color17 == "2") :?>
              <div><input type="checkbox" name="color_check[]" value="2" checked> 飢餓をゼロに</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="2"> 飢餓をゼロに</div>
              <? endif;?>
            </li>
            <li><img src="img/3.png" alt="">
              <? if($color1 == "3" ||  $color2 == "3"  ||  $color3 == "3"  ||  $color4 == "3"  ||  $color5 == "3"  ||  $color6 == "3"  ||  $color7 == "3"  ||  $color8 == "3"  ||  $color9 == "3"  ||  $color10 == "3"  ||  $color11 == "3"  ||  $color12 == "3"  ||  $color13 == "3"  ||  $color14 == "3"  ||  $color15 == "3"  ||  $color16 == "3"  ||  $color17 == "3") :?>
              <div><input type="checkbox" name="color_check[]" value="3" checked> 全ての人に健康と福祉を</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="3"> 全ての人に健康と福祉を</div>
              <? endif;?>
            </li>
            <li><img src="img/4.png" alt="">
              <? if($color1 == "4" ||  $color2 == "4"  ||  $color3 == "4"  ||  $color4 == "4"  ||  $color5 == "4"  ||  $color6 == "4"  ||  $color7 == "4"  ||  $color8 == "4"  ||  $color9 == "4"  ||  $color10 == "4"  ||  $color11 == "4"  ||  $color12 == "4"  ||  $color13 == "4"  ||  $color14 == "4"  ||  $color15 == "4"  ||  $color16 == "4"  ||  $color17 == "4") :?>
              <div><input type="checkbox" name="color_check[]" value="4" checked> 質の高い教育をみんなに</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="4"> 質の高い教育をみんなに</div>
              <? endif;?>
            </li>
            <li><img src="img/5.png" alt="">
              <? if($color1 == "5" ||  $color2 == "5"  ||  $color3 == "5"  ||  $color4 == "5"  ||  $color5 == "5"  ||  $color6 == "5"  ||  $color7 == "5"  ||  $color8 == "5"  ||  $color9 == "5"  ||  $color10 == "5"  ||  $color11 == "5"  ||  $color12 == "5"  ||  $color13 == "5"  ||  $color14 == "5"  ||  $color15 == "5"  ||  $color16 == "5"  ||  $color17 == "5") :?>
              <div><input type="checkbox" name="color_check[]" value="5" checked> ジェンダー平等を実現しよう</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="5"> ジェンダー平等を実現しよう</div>
              <? endif;?>
            </li>
            <li><img src="img/6.png" alt="">
              <? if($color1 == "6" ||  $color2 == "6"  ||  $color3 == "6"  ||  $color4 == "6"  ||  $color5 == "6"  ||  $color6 == "6"  ||  $color7 == "6"  ||  $color8 == "6"  ||  $color9 == "6"  ||  $color10 == "6"  ||  $color11 == "6"  ||  $color12 == "6"  ||  $color13 == "6"  ||  $color14 == "6"  ||  $color15 == "6"  ||  $color16 == "6"  ||  $color17 == "6") :?>
              <div><input type="checkbox" name="color_check[]" value="6" checked> 安全な水とトイレを世界中に</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="6"> 安全な水とトイレを世界中に</div>
              <? endif;?>
            </li>
            <li><img src="img/7.png" alt="">
              <? if($color1 == "7" ||  $color2 == "7"  ||  $color3 == "7"  ||  $color4 == "7"  ||  $color5 == "7"  ||  $color6 == "7"  ||  $color7 == "7"  ||  $color8 == "7"  ||  $color9 == "7"  ||  $color10 == "7"  ||  $color11 == "7"  ||  $color12 == "7"  ||  $color13 == "7"  ||  $color14 == "7"  ||  $color15 == "7"  ||  $color16 == "7"  ||  $color17 == "7") :?>
              <div><input type="checkbox" name="color_check[]" value="7" checked> エネルギーをみんなにそしてクリーンに</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="7"> エネルギーをみんなにそしてクリーンに</div>
              <? endif;?>
            </li>
            <li><img src="img/8.png" alt="">
              <? if($color1 == "8" ||  $color2 == "8"  ||  $color3 == "8"  ||  $color4 == "8"  ||  $color5 == "8"  ||  $color6 == "8"  ||  $color7 == "8"  ||  $color8 == "8"  ||  $color9 == "8"  ||  $color10 == "8"  ||  $color11 == "8"  ||  $color12 == "8"  ||  $color13 == "8"  ||  $color14 == "8"  ||  $color15 == "8"  ||  $color16 == "8"  ||  $color17 == "8") :?>
              <div><input type="checkbox" name="color_check[]" value="8" checked> 働きがいも経済成長も</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="8"> 働きがいも経済成長も</div>
              <? endif;?>
            </li>
            <li><img src="img/9.png" alt="">
              <? if($color1 == "9" ||  $color2 == "9"  ||  $color3 == "9"  ||  $color4 == "9"  ||  $color5 == "9"  ||  $color6 == "9"  ||  $color7 == "9"  ||  $color8 == "9"  ||  $color9 == "9"  ||  $color10 == "9"  ||  $color11 == "9"  ||  $color12 == "9"  ||  $color13 == "9"  ||  $color14 == "9"  ||  $color15 == "9"  ||  $color16 == "9"  ||  $color17 == "9") :?>
              <div><input type="checkbox" name="color_check[]" value="9" checked> 産業と技術革新の基盤をつくろう</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="9"> 産業と技術革新の基盤をつくろう</div>
              <? endif;?>
            </li>
            <li><img src="img/10.png" alt="">
              <? if($color1 == "10" ||  $color2 == "10"  ||  $color3 == "10"  ||  $color4 == "10"  ||  $color5 == "10"  ||  $color6 == "10"  ||  $color7 == "10"  ||  $color8 == "10"  ||  $color9 == "10"  ||  $color10 == "10"  ||  $color11 == "10"  ||  $color12 == "10"  ||  $color13 == "10"  ||  $color14 == "10"  ||  $color15 == "10"  ||  $color16 == "10"  ||  $color17 == "10") :?>
              <div><input type="checkbox" name="color_check[]" value="10" checked> 人や国の不平等をなくそう</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="10"> 人や国の不平等をなくそう</div>
              <? endif;?>
            </li>
            <li><img src="img/11.png" alt="">
              <? if($color1 == "11" ||  $color2 == "11"  ||  $color3 == "11"  ||  $color4 == "11"  ||  $color5 == "11"  ||  $color6 == "11"  ||  $color7 == "11"  ||  $color8 == "11"  ||  $color9 == "11"  ||  $color10 == "11"  ||  $color11 == "11"  ||  $color12 == "11"  ||  $color13 == "11"  ||  $color14 == "11"  ||  $color15 == "11"  ||  $color16 == "11"  ||  $color17 == "11") :?>
              <div><input type="checkbox" name="color_check[]" value="11" checked> 住み続けられる街づくりを</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="11"> 住み続けられる街づくりを</div>
              <? endif;?>
            </li>
            <li><img src="img/12.png" alt="">
              <? if($color1 == "12" ||  $color2 == "12"  ||  $color3 == "12"  ||  $color4 == "12"  ||  $color5 == "12"  ||  $color6 == "12"  ||  $color7 == "12"  ||  $color8 == "12"  ||  $color9 == "12"  ||  $color10 == "12"  ||  $color11 == "12"  ||  $color12 == "12"  ||  $color13 == "12"  ||  $color14 == "12"  ||  $color15 == "12"  ||  $color16 == "12"  ||  $color17 == "12") :?>
              <div><input type="checkbox" name="color_check[]" value="12" checked> つくる責任つかう責任</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="12"> つくる責任つかう責任</div>
              <? endif;?>
            </li>
            <li><img src="img/13.png" alt="">
              <? if($color1 == "13" ||  $color2 == "13"  ||  $color3 == "13"  ||  $color4 == "13"  ||  $color5 == "13"  ||  $color6 == "13"  ||  $color7 == "13"  ||  $color8 == "13"  ||  $color9 == "13"  ||  $color10 == "13"  ||  $color11 == "13"  ||  $color12 == "13"  ||  $color13 == "13"  ||  $color14 == "13"  ||  $color15 == "13"  ||  $color16 == "13"  ||  $color17 == "13") :?>
              <div><input type="checkbox" name="color_check[]" value="13" checked> 気候変動に具体的な対策を</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="13"> 気候変動に具体的な対策を</div>
              <? endif;?>
            </li>
            <li><img src="img/14.png" alt="">
              <? if($color1 == "14" ||  $color2 == "14"  ||  $color3 == "14"  ||  $color4 == "14"  ||  $color5 == "14"  ||  $color6 == "14"  ||  $color7 == "14"  ||  $color8 == "14"  ||  $color9 == "14"  ||  $color10 == "14"  ||  $color11 == "14"  ||  $color12 == "14"  ||  $color13 == "14"  ||  $color14 == "14"  ||  $color15 == "14"  ||  $color16 == "14"  ||  $color17 == "14") :?>
              <div><input type="checkbox" name="color_check[]" value="14" checked> 海の豊かさを守ろう</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="14"> 海の豊かさを守ろう</div>
              <? endif;?>
            </li>
            <li><img src="img/15.png" alt="">
              <? if($color1 == "15" ||  $color2 == "15"  ||  $color3 == "15"  ||  $color4 == "15"  ||  $color5 == "15"  ||  $color6 == "15"  ||  $color7 == "15"  ||  $color8 == "15"  ||  $color9 == "15"  ||  $color10 == "15"  ||  $color11 == "15"  ||  $color12 == "15"  ||  $color13 == "15"  ||  $color14 == "15"  ||  $color15 == "15"  ||  $color16 == "15"  ||  $color17 == "15") :?>
              <div><input type="checkbox" name="color_check[]" value="15" checked> 陸の豊かさも守ろう</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="15"> 陸の豊かさも守ろう</div>
              <? endif;?>
            </li>
            <li><img src="img/16.png" alt="">
              <? if($color1 == "16" ||  $color2 == "16"  ||  $color3 == "16"  ||  $color4 == "16"  ||  $color5 == "16"  ||  $color6 == "16"  ||  $color7 == "16"  ||  $color8 == "16"  ||  $color9 == "16"  ||  $color10 == "16"  ||  $color11 == "16"  ||  $color12 == "16"  ||  $color13 == "16"  ||  $color14 == "16"  ||  $color15 == "16"  ||  $color16 == "16"  ||  $color17 == "16") :?>
              <div><input type="checkbox" name="color_check[]" value="16" checked> 平和と公正を全ての人に</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="16"> 平和と公正を全ての人に</div>
              <? endif;?>
            </li>
            <li><img src="img/17.png" alt="">
              <? if($color1 == "17" ||  $color2 == "17"  ||  $color3 == "17"  ||  $color4 == "17"  ||  $color5 == "17"  ||  $color6 == "17"  ||  $color7 == "17"  ||  $color8 == "17"  ||  $color9 == "17"  ||  $color10 == "17"  ||  $color11 == "17"  ||  $color12 == "17"  ||  $color13 == "17"  ||  $color14 == "17"  ||  $color15 == "17"  ||  $color16 == "17"  ||  $color17 == "17") :?>
              <div><input type="checkbox" name="color_check[]" value="17" checked> パートナーシップで目標を達成しよう</div>
              <? else:?>
              <div><input type="checkbox" name="color_check[]" value="17"> パートナーシップで目標を達成しよう</div>
              <? endif;?>
            </li>
            <!-- <li><img src="img/18.png" alt=""><div><input type="checkbox" name="riyu" value="1" checked="checked"> 貧困をなくそう</div></li> -->
          </ul>
      </div>
    </div>
    <br>
    <div class="form-box">
      <label for="GET-project_title">プロジェクトタイトル（最大20文字）</label><br>
      <input class="form-style" id="GET-project_title" maxlentgth="20" type="text" name="project_title" placeholder="例）海洋ゴミを洋服に変える。FASHION × SEA プロジェクト" value="<? echo($project_title) ?>">

      <label for="">職種（最大3つ）</label><br>
      <? if($work0 == "グラフィック" || $work1 == "グラフィック"  || $work2 == "グラフィック") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="グラフィック" checked> グラフィック
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="グラフィック"> グラフィック
      <? endif;?>
      <? if($work0 == "WEB" || $work1 == "WEB"  || $work2 == "WEB") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="WEB" checked> WEB
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="WEB"> WEB
      <? endif;?>
      <? if($work0 == "UI" || $work1 == "UI"  || $work2 == "UI") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="UI" checked> UI
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="UI"> UI
      <? endif;?>
      <? if($work0 == "UX" || $work1 == "UX"  || $work2 == "UX") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="UX" checked> UX <br>
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="UX"> UX <br>
      <? endif;?>
      <? if($work0 == "DX" || $work1 == "DX"  || $work2 == "DX") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="DX" checked> DX
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="DX"> DX
      <? endif;?>
      <? if($work0 == "DTP" || $work1 == "DTP"  || $work2 == "DTP") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="DTP" checked> DTP
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="DTP"> DTP
      <? endif;?>
      <? if($work0 == "プロダクト" || $work1 == "プロダクト"  || $work2 == "プロダクト") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="プロダクト" checked> プロダクト 　<br>
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="プロダクト"> プロダクト 　<br>
      <? endif;?>
      <? if($work0 == "パッケージ" || $work1 == "パッケージ"  || $work2 == "パッケージ") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="パッケージ" checked> パッケージ 　
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="パッケージ"> パッケージ 　
      <? endif;?>
      <? if($work0 == "ファッション" || $work1 == "ファッション"  || $work2 == "ファッション") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="ファッション" checked> ファッション 　
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="ファッション"> ファッション
      <? endif;?>
      <? if($work0 == "映像" || $work1 == "映像"  || $work2 == "映像") :?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="映像" checked> 映像 　<br>
      <? else:?>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="映像"> 映像 　<br>
      <? endif;?>
      <br>

      <label for="GET-project_overview">プロジェクトの概要（最大40文字）</label><br>
      <textarea class="form-style-textbox40" id="GET-project_overview" type="text" wrap="soft" maxlength="40" name="project_overview" placeholder="例）海のゴミから布を作り、洋服へ。魔法のようなプロジェクトを創り出すデザイン集団、求ム！" value="<? echo($project_overview)?>" required></textarea>


      <label for="GET-project_detail">プロジェクトの詳細（最大230文字※改行不可）</label><br>
      <textarea class="form-style-textbox230" id="GET-project_detail" type="text" wrap="soft" maxlength="230" name="project_detail" placeholder="例）海洋ゴミを洋服に変える、魔法のようなプロジェクト。アプリのUIデザイン、パンフ作成、商品用パッケージや、洋服のデザインを行うデザイナーを募集しています。今、話題のSDGｓの取り組みを一緒に広げましょう。" value="<? echo($project_detail) ?>" required></textarea>

      <label for="GET-production_period">制作期間</label><br>
      <input class="form-style" id="GET-production_period" type="text" name="production_period" placeholder="例）5月中旬まで" value="<? echo($production_period) ?> " required />

      <label for="GET-name">
        <? if($remote_availability == "リモート可"  ) :?>
        <input class="form" id="GET-remote_availability" type="radio" name="remote_availability" value="リモート可" checked /> リモート可　
        <input class="form" id="GET-remote_availability" type="radio" name="remote_availability" value="リモート不可" /> 不可
      </label><br>
      <? else:?>
      <input class="form" id="GET-remote_availability" type="radio" name="remote_availability" value="リモート可" /> リモート可　
      <input class="form" id="GET-remote_availability" type="radio" name="remote_availability" value="リモート不可" checked /> 不可</label><br>
      <? endif;?>
      <br>
      <div class="center">
        <button><img class="button-up" src="img/bt-hensyu.png" alt=""></button>
        <!-- <a href="php_act/ogp_update_act.php?id=<?= $id ?>"></a> -->
        <a href="php_act/ogp_delite.php?id=<?= $id ?>"><img class="button-up" src="img/bt-sakujyo.png" alt=""></a>
        <!-- <a href="ogp_check2.php" class="simple_square_btn1"> -->
        <!-- </a> -->
      </div>
      <br>
      <br>
      </input>

      </form>
  </main>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
    $(function() {
      $("#form").on('submit', function(e) {
        var flg = $(this).find('input[name="color_check[]"]:checked').length == 0;
        if (flg) {
          e.preventDefault();
          alert("SDGs目標は1つ以上選択してください");
        }
      });
    });

    $(function() {
      $("#form").on('submit', function(e) {
        var flg = $(this).find('input[name="job_category[]"]:checked').length == 0;
        if (flg) {
          e.preventDefault();
          alert("職種は1つ以上選択してくださいい");
        }
      });
    });
  </script>



<script>
  var limit = 3; //チェックできる数
  Flag = new Array(); //チェックの有無を格納する配列

  // チェックボックス初回判定
  // --------------------
  var v = 0; //チェックの合計
  var Myname = document.getElementsByName("job_category[]"); // 指定したnameの要素をすべて取得
  for (i = 0; i < Myname.length; i++) {
    Flag[i] = i; // 配列　Flagを初期化
    if (Myname[i].checked) {
      Flag[i] = "chk"; // チェックが入っていれば文字列 "chk" を代入
      v++;
    } //チェックの合計数を 1 増やします
  }

  if (v >= limit) { //チェックの合計数が制限数になれば
    for (i = 0; i < Myname.length; i++) {
      if (Flag[i] == "chk") {
        Myname[i].disabled = false;
      } else {
        Myname[i].disabled = true;
      }
    }
  } else {
    for (i = 0; i < Myname.length; i++)
      Myname[i].disabled = false;
  }
  // --------------------





  // クリックするたびに非表示判定
  // --------------------
  function Climit() {
    var v = 0; //チェックの合計
    var Myname = document.getElementsByName("job_category[]"); // 指定したnameの要素をすべて取得
    for (i = 0; i < Myname.length; i++) {
      Flag[i] = i; // 配列　Flagを初期化
      if (Myname[i].checked) {
        Flag[i] = "chk"; // チェックが入っていれば文字列 "chk" を代入
        v++;
      } //チェックの合計数を 1 増やします
    }

    if (v >= limit) { //チェックの合計数が制限数になれば
      for (i = 0; i < Myname.length; i++) {
        if (Flag[i] == "chk") {
          Myname[i].disabled = false;
        } else {
          Myname[i].disabled = true;
        }
      }
    } else {
      for (i = 0; i < Myname.length; i++)
        Myname[i].disabled = false;
    }
  }
</script>


</html>