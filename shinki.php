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
  <link rel="stylesheet" href="css/shinki.css" />
</head>

<body>
  <main>

    <br>
    <h1>新規登録</h1>
    <div class="form-box">

      <p class="hissu">* 必須項目
      </p>
      <form action="" method="post" class="row">
        <label for="company">会社名</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="例）〇〇会社"/>

        <br />

        <label for="GET-name">メールアドレス（半角英数のみ）</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="例）sample@example.com"/>

        <br />


        <label for="GET-name">パスワード</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="パスワードは半角英数字8文字以上、20文字以内で入力してください"/>

        <br />


        <label for="GET-name">担当者名</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="例）山田太郎"/>

        <br />

        <label for="GET-name">所在地（都道府県のみ）</label><span class="hissu">  *</span><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="選択してください"/>

        <br />

        <label for="GET-name">事業内容</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="例）出版・メディア広告・総合プロデュース"/>

        <br />

        <label for="GET-name">分野</label><span class="hissu">  *</span><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="選択してください"/>

        <br />

        <label for="GET-name">資本金</label><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="選択してください"/>

        <br />

        <label for="GET-name">社員数</label><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="選択してください"/>


              <!-- プルダウンここから -->
              <div class="selectdiv">
                <label>
                    <select>
                        <option selected> 選択してください </option>
                        <option class="syozai">Option 1</option>
                        <option class="syozai">Option 2</option>
                        <option class="syozai">Last long option</option>
                    </select>
                </label>
              </div>
              <!-- プルダウンここまで -->

    </div>
    <br>



    
    <!-- モーダルここから -->
    <section id="modalArea" class="modalArea">
      <div id="modalBg" class="modalBg"></div>
      <div class="modalWrapper">
        <div class="modalContents">
          <br>
          <h1>THANKS!!</h1><br>
          <div class="form-box"><br>
            <br>
            <p>ご登録ありがとうございました。</p>
              <br><br><br>
              <div class="center">
                <button class="simple_square_btn1"><a href="ogp-new.html">はい</a></button></div><br />
            </form><br>

          </div>
          <div id="closeModal" class="closeModal">
            ×
          </div>
        </div>
    </section>
    <!-- モーダルここまで -->

    <div class="center">
      <button id="openModal" class="simple_square_btn1">送信する</button>
    </div>
  </div>
    </input>
    </form>





  </main>
  <!-- ↓body閉じタグ直前でjQueryを読み込む -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- 自作js -->
  <script type="text/javascript" src="js/pop-up.js"></script>
</body>

</html>