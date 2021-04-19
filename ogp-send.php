<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('php_act/functions.php');
check_session_id();

// var_dump($_POST);
// exit;

$clients_id = $_SESSION["id"];

// var_dump($_GET);
// exit;


if(!isset($_GET["id"])){
  // var_dump("hoge");
  // exit;

// 入れたばかりのデータを持ってくる
$pdo = connect_to_db();
// $sql = "SELECT * FROM ogp_table where id ";
$sql = "SELECT * FROM ogp_table2 WHERE id = (SELECT MAX(id) FROM ogp_table2); ";
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $posts = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $posts["id"];
  $clients_id = $posts["clients_id"];
  $img = $posts["img"];
  $color_check = $posts["color_check"];
  $project_title = $posts["project_title"];
  $job_category = $posts["job_category"];
  $project_overview = $posts["project_overview"];
  $project_detail = $posts["project_detail"];
  $production_period = $posts["production_period"];
  $remote_availability = $posts["remote_availability"];

}

}






// すでにOGPを作成しているときはデータが入っている状態
if(isset($_GET["id"])){
  // var_dump("test");
  // exit;
  $id = $_GET["id"];

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
    $project_overview = $post["project_overview "];
    $project_detail = $post["project_detail"];
    $production_period = $post["production_period"];
    $remote_availability = $post["remote_availability"];
  
    // var_dump($img);
    // exit;
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
    <link rel="stylesheet" href="css/ress.min.css" />

    <!-- Googleフォント -->

    <!-- Fon Awesome読込み -->
    <link
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      rel="stylesheet"/>
    <!-- オリジナルcomponent.CSS -->
    <link rel="stylesheet" href="css/component.css" />
        <link rel="stylesheet" href="css/ogp-send.css" />
     <link rel="stylesheet" href="css/ogp-syosai.css" />


  </head>


  <body>

 <div class="all-wrapper">

            <div class="header">
              <div><a href="ogp-ichiran.php"><img class="home-logo" src="img/home-logo.png" alt=""></a></div>
              <div><a href="php_act/logout.php"><img class="logout-bt" src="img/logout-bt.png" alt=""></a></div>
            </div> 
        
    <main>
          

          <br>
                 <figure>      
                  <img class="ogp-img" src="<?= $img ?>" alt="">
                 </figure>
                    <!-- <hr color="#C4C4C4" width="100%" size="1"> -->

                <!-- ここからmaruweb2のhtml詳細ページの記述 -->

             <div class="remote-box">
                  <div class="tab">
                  <p>リモート可</p>
                  </div>
                  <p>　 | 　</p><p>期限：5月末を予定</p>
  
              </div> 
    <div class="all-text-wrapper">
                           
                <p class="project-text1">海のゴミから布を作り、洋服へ。魔法のようなプロジェクトを創り出すデザイン集団、求ム！</p>
                <p class="project-text2">
                  海洋ゴミを洋服に変える、魔法のようなプロジェクト。アプリのUIデザイン、パンフ作成、商品用パッケージや、洋服のデザインを行うデザイナーを募集しています。今、話題のSDGsの取り組みを一緒に広げましょう。</p>
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

          <!-- ここまでmaruweb2詳細ページの記述 -->





              <p class="send-text">プロジェクトを作成しました！<br>
                作ったプロジェクトはtwitterで広めましょう！</p>
                <br>
                  
              <div>
               <a href="https://twitter.com/share?url=https://lively-miyakonojo-7603.lolipop.io//ogp-syosai.php?id=<? echo($id) ?>&text=デザイナー募集中"><img class="bt-tweet" src="img/bt-tweet.png" alt=""></a><input type="submit" value="" /></input>
</div> 
                  <div class="button-box">
                  <a href="ogp-ichiran.php"><img class="bt-mini" src="img/bt-ichiran.png" alt=""></a>
                  <a href="ogp-update.php?id=<? echo($id) ?>"><img class="bt-mini" src="img/bt-hensyu.png" alt=""></a>
                  <br>
                  </div>

                  <br>
                  <br>
                    </input>
                      </form>
               
      </div>      
    </main>

</div>
  </body>
</html>
