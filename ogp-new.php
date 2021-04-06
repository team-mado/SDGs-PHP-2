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
      <div><a href="index.html"><img class="home-logo" src="img/home-logo.png" alt="" /></a></div>
    </div>
  </header>
  <main>
    <div class="gray-box">
      <p>
        下記のフォームを全て入力いただくと<br />
        こちらの枠内に自動でバナーが生成されます
      </p>
    </div>
    <p>SDGｓ17の目標の中から、該当する項目を選んでください  ※複数選択可</p>
<br>
    <div class="checkbox-center">
      <div>
        <form action="cgi-bin/abc.cgi" method="post">
          <ul>
            <li><img src="img/1.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 貧困をなくそう</div>
            </li>
            <li><img src="img/2.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 飢餓をゼロに</div>
            </li>
            <li><img src="img/3.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 全ての人に健康と福祉を</div>
            </li>
            <li><img src="img/4.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 質の高い教育をみんなに</div>
            </li>
            <li><img src="img/5.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> ジェンダー平等を実現しよう</div>
            </li>
            <li><img src="img/6.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 安全な水とトイレを世界中に</div>
            </li>
            <li><img src="img/7.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> エネルギーをみんなにそしてクリーンに</div>
            </li>
            <li><img src="img/8.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 働きがいも経済成長も</div>
            </li>
            <li><img src="img/9.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 産業と技術革新の基盤をつくろう</div>
            </li>

            <li><img src="img/10.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 人や国の不平等をなくそう</div>
            </li>
            <li><img src="img/11.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 住み続けられる街づくりを</div>
            </li>
            <li><img src="img/12.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> つくる責任つかう責任</div>
            </li>
            <li><img src="img/13.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 機構変動に具体的な対策を</div>
            </li>
            <li><img src="img/14.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 海の豊かさを守ろう</div>
            </li>
            <li><img src="img/15.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 陸の豊かさも守ろう</div>
            </li>
            <li><img src="img/16.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> 平和と公正を全ての人に</div>
            </li>
            <li><img src="img/17.png" alt="">
              <div><input type="checkbox" name="riyu" value="1"> パートナーシップで目標を達成しよう</div>
            </li>
            <!-- <li><img src="img/18.png" alt=""><div><input type="checkbox" name="riyu" value="1" checked="checked"> 貧困をなくそう</div></li> -->
          </ul>
        </form>
      </div>
    </div>
<br>
    <div class="form-box">
      <form action="" method="post" class="row">
        <label for="GET-name">プロジェクトタイトル（最大20文字）</label><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="例）海洋ゴミを洋服に変える。FASHION × SEA プロジェクト"/>

 <label for="GET-name">職種（最大3つ）</label><br>
        <input type="checkbox" name="riyu" value="1"> グラフィック  　
        <input type="checkbox" name="riyu" value="1"> WEB  　
        <input type="checkbox" name="riyu" value="1"> UI  　
        <input type="checkbox" name="riyu" value="1"> UX  　<br>
        <input type="checkbox" name="riyu" value="1"> DX  　
        <input type="checkbox" name="riyu" value="1"> DTP  　
        <input type="checkbox" name="riyu" value="1"> プロダクト  　<br>
        <input type="checkbox" name="riyu" value="1"> パッケージ  　
        <input type="checkbox" name="riyu" value="1"> ファッション  　
        <input type="checkbox" name="riyu" value="1"> 映像  　<br>  
        <br>

        <label for="GET-name">プロジェクトの概要（最大40文字）</label><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="例）海のゴミから布を作り、洋服へ。魔法のようなプロジェクトを創り出すデザイン集団、求ム！"/>
        

        <label for="GET-name">プロジェクトの詳細（最大230文字※改行不可）</label><br>
        <input class="form-syosai" id="GET-name" type="text" name="name" placeholder="例）海洋ゴミを洋服に変える、魔法のようなプロジェクト。アプリのUIデザイン、パンフ作成、商品用パッケージや、洋服のデザインを行うデザイナーを募集しています。今、話題のSDGｓの取り組みを一緒に広げましょう。"/>

        <label for="GET-name">制作期間</label><br>
        <input class="form-style" id="GET-name" type="text" name="name" placeholder="例）5月中旬まで"/>

        <label for="GET-name">
          <input class="form" id="GET-name" type="radio" name="remote" value="リモート可" /> リモート可　
          <input class="form" id="GET-name" type="radio" name="remote" value="リモート不可" /> 不可</label><br>

        <br>

        <div class="center">
          <a href="ogp-send.html"><img class="hozon-bt" src="img/bt-save.png" alt="">
              <input type="submit" value="" /></a></input>
          </button>
        </div>
        <br>
        <br>
        </input>
      </form>
  </main>
</body>

</html>