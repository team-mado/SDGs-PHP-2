<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('php_act/functions.php');




if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pdo = connect_to_db();
    $sql = 'SELECT * FROM clients_table WHERE email=:email AND password=:password';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $status = $stmt->execute();

    if ($status == false) {

        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        $val = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$val) {

            if(isset($_POST)){
              $error = "0";
            }
        } else {
            $_SESSION = array();
            $_SESSION["session_id"] = session_id();
            $_SESSION["id"] = $val["id"];
            $_SESSION["staff"] = $val["staff"];
            $_SESSION["email"] = $val["email"];
            header('Location:ogp-ichiran.php');
        }
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
  <!-- オリジナルcomponent.CSS -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />
  <link rel="stylesheet" href="css/component.css" />
  <!-- リセットCSS -->
  <link rel="stylesheet" href="css/ress.min.css" />
  <!-- モーダル用CSS -->
  <!-- <link rel="stylesheet" href="css/modal.css" /> -->
  <!-- Googleフォント -->
  <!-- Fon Awesome読込み -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />

</head>

<body>
  <main>
<div class="main-box">
    <div class="button-box">

      <div>
          <br>
          <br>
          <h2>
            SDGｓのプロジェクトを一気に告知！<br>
            担当デザイナーを<br>
            ツイッターから大募集！
          </h2>
          <br />
        <h1>SDGｓ×デザインの<br>
          マッチングサービス</h1>
          <img class="top-logo" src="img/home-logo.png" alt="">
          

        <!-- モーダルここから -->
        <section id="modalArea" class="modalArea">
          <div id="modalBg" class="modalBg"></div>
          <div class="modalWrapper">
            <div class="modalContents">
              <br>
              <h1>LOGIN</h1><br>
              <div class="form-box">
                <form action="" method="post" class="row">
                  <label for="GET-email">E-MAIL</label><br>
                  <input class="form-style" id="GET-email" type="text" name="email" value="test@gmail.com" required/>
                  <label for="GET-password">PASSWORD</label><br>
                  <input class="form-style" id="GET-password" type="password" name="password" value="test" required/>
                  <br><br>
                  <div class="center">
                    <button class="simple_square_btn2">送信する</button></div><br />
                </form><br>

              </div>
              <div id="closeModal" class="closeModal">
                ×
              </div>
           </div>
          </div>
        </section>
        <!-- モーダルここまで -->


        <!-- idでモーダル実装 -->
    <br><br>
        <button id="openModal" class="simple_square_btn1">ログイン</button>
        <br />
        <a href="shinki.php"><button class="simple_square_btn1">新規登録</button></a><br />
        <!-- <p class="pw-text">PWをお忘れの方は<a href="mailto:design.up.sdgs@gmail.com?subject=【問合せ】パスワードの問い合わせ依頼依頼&amp;body=そのまま送信してください">こちら</a>から</p> -->
      </div>
       <img class="top-img" src="img/top-img.png" alt=""><br>
   </div>  


</div> 
  </main>

  <!-- ↓body閉じタグ直前でjQueryを読み込む -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- 自作js -->
  <script type="text/javascript" src="js/pop-up.js"></script>
</body>



</html>