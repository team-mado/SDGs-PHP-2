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
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
  <!-- モーダル用CSS -->
  <!-- <link rel="stylesheet" href="css/modal.css" /> -->
  <!-- Googleフォント -->
  <!-- Fon Awesome読込み -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />

</head>

<body>
  <main>
    <div class="gray-box">
      <br />
      <img class="top-logo" src="img/logo-.png" alt="" />
    </div>
    <br />








    <div class="button-box">

      <div>
        <br>
        <h2>
          SDGsの取り組みをSNSから広く告知！<br />
          プロジェクトを担当するデザイナーを<br />
          SNSで拡散募集できる<br />
          SDGｓプロジェクト広報支援サービス
        </h2><br>


        <!-- モーダルここから -->
        <section id="modalArea" class="modalArea">
          <div id="modalBg" class="modalBg"></div>
          <div class="modalWrapper">
            <div class="modalContents">
              <br>
              <h1>LOGIN</h1><br>
              <div class="form-box">
                <form action="" method="post" class="row">
                  <label for="GET-name">E-MAIL</label><br>
                  <input class="form-style" id="GET-name" type="text" name="name" />
                  <label for="GET-name">PASSWORD</label><br>
                  <input class="form-style" id="GET-name" type="text" name="name" />
                  <br><br>
                  <div class="center">
                    <button class="simple_square_btn1"><a href="ogp-new.html">送信する</a></button></div><br />
                </form><br>

              </div>
              <div id="closeModal" class="closeModal">
                ×
              </div>
            </div>
        </section>
        <!-- モーダルここまで -->


        <!-- idでモーダル実装 -->
        <button id="openModal" class="simple_square_btn1">ログイン</button>

        <br />
        <a href="shinki.html"><button class="simple_square_btn1">新規登録</button></a><br /><br />
        <p class="pw-text">PWをお忘れの方は<a href="">こちら</a>から</p>
        <br />


      </div>
      <br />
  </main>

  <!-- ↓body閉じタグ直前でjQueryを読み込む -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- 自作js -->
  <script type="text/javascript" src="js/pop-up.js"></script>
</body>

</html>