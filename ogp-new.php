<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('php_act/functions.php');
check_session_id();

$clients_id = $_SESSION["id"];
// // var_dump($_GET["id"]);
// // exit;


// 初期画面
if (!isset($_GET["id"])) {
  // $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_25_bold:下記のフォームを全て入力いただくと%0Aこちらの枠内にバナーが生成されます,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png";
  // $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_35_bold:下記のフォームを全て入力いただくと%0Aこちらの枠内にバナーが生成されます,co_rgb:fff,w_750,c_fit/v1617152888/banar1_zf56ul.png";
}



// OGP編集時にID取得
if (isset($_GET["id"])) {
  $id = $_GET["id"];
}

// // すでにOGPを作成しているときはデータが入っている状態
if (isset($_GET["id"])) {

  $pdo = connect_to_db();
  $sql = "SELECT * FROM ogp_table2 where id = :id";
  // // var_dump($sql);
  // // exit;
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
    $project_overview = $post["project_overview "];
    $project_detail = $post["project_detail"];
    $production_period = $post["production_period"];
    $remote_availability = $post["remote_availability"];
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>DESIGN UP! SDGs</title>

  <!-- リセットCSS -->
  <link href="css/ress.min.css" rel="stylesheet" />

  <!-- Googleフォント -->

  <!-- Fon Awesome読込み -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  <!-- オリジナルcomponent.CSS -->
  <link rel="stylesheet" href="css/component.css" />
  <link rel="stylesheet" href="css/ogp-new.css" />
  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
</head>


<body>
  <header>
    <div class="header">
      <div><a href="ogp-ichiran.php"><img class="home-logo" src="img/home-logo.png" alt=""></a></div>
      <div><a href="php_act/logout.php"><img class="logout-bt" src="img/logout-bt.png" alt=""></a></div>
    </div>
  </header>
  <main>
  <br>
    <figure>
      <img class="ogp-img" src="img/banar-ogp-new.png" alt="">
    </figure>
    <!-- <p>
        下記のフォームを全て入力いただくと<br />
        こちらの枠内に自動でバナーが生成されます
      </p> -->
    </div>
    <p class="sdgs-text">SDGｓ17の目標の中から、該当する項目を選んでください ※複数選択可</p>
    <br>
    <div class="checkbox-center">
      <div>
        <form action="php_act/ogp_act.php" method="post" class="form">
          <ul class="check_answer">
            <li><img src="img/1.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="1"> <span>貧困をなくそう</span></div>
            </li>
            <li><img src="img/2.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="2"> <span>飢餓をゼロに</span></div>
            </li>
            <li><img src="img/3.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="3" checked> <span>全ての人に健康と福祉を</span></div>
            </li>
            <li><img src="img/4.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="4"> <span>質の高い教育をみんなに</span></div>
            </li>
            <li><img src="img/5.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="5"> <span>ジェンダー平等を実現しよう</span></div>
            </li>
            <li><img src="img/6.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="6"> <span>安全な水とトイレを世界中に</span></div>
            </li>
            <li><img src="img/7.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="7" checked> <span>エネルギーをみんなにそしてクリーンに</span><br>
              </div>
            </li>
            <li><img src="img/8.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="8"> <span>働きがいも経済成長も</span></div>
            </li>
            <li><img src="img/9.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="9" checked> <span>産業と技術革新の基盤をつくろう</span><br>
              </div>
            </li>
            <li><img src="img/10.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="10" > <span>人や国の不平等をなくそう</span></div>
            </li>
            <li><img src="img/11.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="11"> <span>住み続けられる街づくりを</span></div>
            </li>
            <li><img src="img/12.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="12" checked> <span>つくる責任つかう責任</span></div>
            </li>
            <li><img src="img/13.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="13" checked> <span>気候変動に具体的な対策を</span></div>
            </li>
            <li><img src="img/14.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="14" checked> <span>海の豊かさを守ろう</span></div>
            </li>
            <li><img src="img/15.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="15"> <span>陸の豊かさも守ろう</span></div>
            </li>
            <li><img src="img/16.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="16"> <span>平和と公正を全ての人に</span></div>
            </li>
            <li><img src="img/17.png" alt="">
              <div><input type="checkbox" name="color_check[]" value="17"> <span>パートナーシップで目標を達成しよう</span></div>
            </li>
          </ul>
      </div>
    </div>
    <br>
    <form action="php_act/ogp_act.php" method="post" class="form">
    <div class="form-box">
      <label for="GET-project_title">プロジェクトタイトル（最大25文字）</label><br>
      <input class="form-style" id="GET-project_title" type="text" maxlength="25" name="project_title" placeholder="例）海を服に Fashion×Sea Next" value="海を服に Fashion×Sea Next"  required>
      <label for="">職種（最大3つ）</label><br>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="グラフィック" checked> グラフィック 　
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="WEB"> WEB 　
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="UI"> UI 　<br>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="UX"> UX 　
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="DX" checked> DX 　
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="DTP"> DTP 　<br>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="プロダクト"> プロダクト 　　
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="パッケージ"> パッケージ 　<br>
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="ファッション" checked> ファッション 　
      <input type="checkbox" onclick="Climit()" name="job_category[]" value="映像"> 映像 　<br>
      <br>


      <label for="GET-project_overview">プロジェクトの概要（最大35文字※改行不可）</label><br>
      <textarea class="form-style-textbox40" id="GET-project_overview" type="text" wrap="soft" maxlength="35" name="project_overview" placeholder="例）海のゴミから布を作り洋服へ。魔法のようなプロジェクトを創り出すデザイン集団求ム！" >海のゴミから布を作り洋服へ。魔法のようなプロジェクトを創り出すデザイン集団求ム！</textarea>


      <label for="GET-project_detail">プロジェクトの詳細（最大230文字※改行不可）</label><br>
      <textarea class="form-style-textbox230" id="GET-project_detail" type="text" wrap="soft" maxlength="230" name="project_detail" placeholder="例）海洋ゴミを洋服に変える、魔法のようなプロジェクト。アプリのUIデザイン、パンフ作成、商品用パッケージや、洋服のデザインを行うデザイナーを募集しています。今、話題のSDGｓの取り組みを一緒に広げましょう。" >海洋ゴミを洋服に変える、魔法のようなプロジェクト。アプリのUIデザイン、パンフ作成、商品用パッケージや、洋服のデザインを行うデザイナーを募集しています。今、話題のSDGｓの取り組みを一緒に広げましょう。</textarea>

      <label for="GET-production_period">制作期限</label><br>
      <input class="form-style" id="GET-production_period" type="date" name="production_period" value="2021-04-30" >
      <!-- <input class="form-style" id="GET-production_period" type="text" name="production_period" placeholder="例）5月中旬まで" required /> -->

      <label for="GET-remote_availability">
        <input class="form" id="GET-remote_availability" type="radio" name="remote_availability" value="リモート可" checked /> リモート可　
        <input class="form" id="GET-remote_availability" type="radio" name="remote_availability" value="リモート不可" /> 不可</label><br>
      <br>
      <div class="center">
        <button class="simple_square_btn1">
          <!-- <a href="ogp_act.php"> -->
          <input type="submit" value="" />送信する</input>
          <!-- </a> -->
        </button>
      </div>
      <br>
      <br>
      </input>
    </form>
  </main>
</body>


<script>
  $(function() {
    $('#GET-project_overview')
      // cancelEnterとついたクラスにkeydownイベントを付与
      .on('keydown', function(e) {
        // e.key == 'Enter'でエンターキーが押された場合の条件を設定
        if (e.key == 'Enter') {
          // 何もせずに処理を終える
          return false;
        }
      })
  });
</script>


<script>
  $(function() {
    $('#GET-project_detail')
      // cancelEnterとついたクラスにkeydownイベントを付与
      .on('keydown', function(e) {
        // e.key == 'Enter'でエンターキーが押された場合の条件を設定
        if (e.key == 'Enter') {
          // 何もせずに処理を終える
          return false;
        }
      })
  });
</script>



<script>
  $(function() {
    $(".form").on('submit', function(e) {
      var flg = $(".check_answer").find('input[name="color_check[]"]:checked').length == 0;
      console.log(flg);
      if (flg) {
        e.preventDefault();
        alert("SDGs目標は1つ以上選択してください");
      }
    });
  });


  $(function() {
    $(".form").on('submit', function(e) {
      var flg1 = $(".form-box").find('input[name="job_category[]"]:checked').length == 0;
      console.log(flg1);
      if (flg1) {
        e.preventDefault();
        alert("職種は1つ以上選択してください");
      }
    });
  });
// </script>






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