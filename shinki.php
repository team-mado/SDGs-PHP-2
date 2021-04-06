




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
        <input class="form-style" id="GET-name" type="text" name="company_name"  placeholder="例）〇〇会社" value="test"/>

        <br />

        <label for="GET-name">メールアドレス（半角英数のみ）</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-name" type="text" name="email" placeholder="例）sample@example.com" value="test"/>

        <br />


        <label for="GET-name">パスワード</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-name" type="text" name="password" placeholder="パスワードは半角英数字8文字以上、20文字以内で入力してください" value="test"/>

        <br />


        <label for="GET-name">担当者名</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-name" type="text" name="staff" placeholder="例）山田太郎" value="test"/>

        <br />

        <label for="GET-name">所在地（都道府県のみ）</label><span class="hissu">  *</span><br>
        <select class="form-style" id="GET-name" type="text" name="location" value="選択してください">
        <option value="東京">東京</option>
        <option value="北海道">北海道</option>
        <option value="青森県">青森県</option>
        <option value="岩手県">岩手県</option>
        <option value="宮城県">宮城県</option>
        <option value="秋田県">秋田県</option>
        <option value="山形県">山形県</option>
        <option value="福島県">福島県</option>
        <option value="茨城県">茨城県</option>
        <option value="栃木県">栃木県</option>
        <option value="群馬県">群馬県</option>
        <option value="埼玉県">埼玉県</option>
        <option value="千葉県">千葉県</option>
        <option value="東京都">東京都</option>
        <option value="神奈川県">神奈川県</option>
        <option value="新潟県">新潟県</option>
        <option value="富山県">富山県</option>
        <option value="石川県">石川県</option>
        <option value="福井県">福井県</option>
        <option value="山梨県">山梨県</option>
        <option value="長野県">長野県</option>
        <option value="岐阜県">岐阜県</option>
        <option value="静岡県">静岡県</option>
        <option value="愛知県">愛知県</option>
        <option value="三重県">三重県</option>
        <option value="滋賀県">滋賀県</option>
        <option value="京都府">京都府</option>
        <option value="大阪府">大阪府</option>
        <option value="兵庫県">兵庫県</option>
        <option value="奈良県">奈良県</option>
        <option value="和歌山県">和歌山県</option>
        <option value="鳥取県">鳥取県</option>
        <option value="島根県">島根県</option>
        <option value="岡山県">岡山県</option>
        <option value="広島県">広島県</option>
        <option value="山口県">山口県</option>
        <option value="徳島県">徳島県</option>
        <option value="香川県">香川県</option>
        <option value="愛媛県">愛媛県</option>
        <option value="高知県">高知県</option>
        <option value="福岡県">福岡県</option>
        <option value="佐賀県">佐賀県</option>
        <option value="長崎県">長崎県</option>
        <option value="熊本県">熊本県</option>
        <option value="大分県">大分県</option>
        <option value="宮崎県">宮崎県</option>
        <option value="鹿児島県">鹿児島県</option>
        <option value="沖縄県">沖縄県</option>
        </select>

        <br />

        <label for="GET-name">事業内容</label><span class="hissu"> *</span><br>
        <input class="form-style" id="GET-name" type="text" name="businesscontent" placeholder="例）出版・メディア広告・総合プロデュース" value="test"/>

        <br />

        <label for="GET-name">分野</label><span class="hissu">  *</span><br>
        <select class="form-style" id="GET-name" type="" name="field"　value="選択してください">
        <option value="製造業">製造業</option>
        <option value="電気・ガス業">電気・ガス業</option>
        <option value="運輸・情報通信業">運輸・情報通信業</option>
        <option value="商業">商業</option>
        <option value="金融・保険業">金融・保険業</option>
        <option value="不動産業">不動産業</option>
        <option value="サービス業">サービス業</option>
        <option value="水産・農林業">水産・農林業</option>
        <option value="鉱業">鉱業</option>
        <option value="建設業">建設業</option>
        </select>
        <br />

        <label for="GET-name">資本金</label><br>
        <select class="form-style" id="GET-name" type="" name="capital" >
        <option value="~100万円">~100万円</option>
        <option value="~500万円">~500万円</option>
        <option value="～1000万円">~1000万円</option>
        <option value="～5000万円">~5000万円</option>
        <option value="～1億円">~1億円</option>
        <option value="～3億円">~3億円</option>
        <option value="それ以上">それ以上</option>
        </select>
        <br />


        <input class="form-style" id="GET-name" type="text" name="name" placeholder="選択してください"/>
        <!-- <select class="form-style" id="GET-name" type="" name="number_of_employees"> -->
        <option value="～20人">～20人</option>
        <option value="～50人">～50人</option>
        <option value="～100人">～100人</option>
        <option value="～300人">～300人</option>
        <option value="それ以上">それ以上</option>
        </select>
        <br />

        <label for="GET-name">社員数</label><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="選択してください"/>
        <option value="～20人">～20人</option>
        <option value="～50人">～50人</option>
        <option value="～100人">～100人</option>
        <option value="～300人">～300人</option>
        <option value="それ以上">それ以上</option>
        </select>


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
    <!-- <section id="modalArea" class="modalArea">
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
    </section> -->
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