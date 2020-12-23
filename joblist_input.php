<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> 職業体験マッチング（入力画面）</title>
</head>

<body>
  <!-- formで"joblist_create.php" を使うよという宣言をする(最初これが抜けてた) -->
  <form action="joblist_create.php" method="POST">/
    <fieldset>
      <legend> 職業体験マッチング（入力画面）</legend>
      <a href="joblist_read.php">一覧画面</a>

      <div>
        お仕事: <input type="text" name="joblist">
      </div>
      <div>
        具体的なスキル(資格とかじゃなくてOK。何ができるか？を具体的に書いてください):</br>
         <input type="text" name="skill">
      </div>
      <div>
        住んでいる地域: <input type="text" name="region">
      </div>
      <div>
        登録日 <input type="date" name="resistDate">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>



<!-- 子供側。createのphpは別にしたい。 -->
    <!-- <form action="joblist_create.php" method="POST">/
    <fieldset>
      <legend> 職業体験マッチング（入力画面）</legend>
      <a href="joblist_read.php">一覧画面</a>

      <div>
        学校: <input type="text" name="school">
      </div>
      <div>
        年齢: <input type="text" name="school">
      </div>
      <div>
        どんなことをやりたいか？(職業名とかじゃなくてOK。何がしたいか？を具体的に書いてください):</br>
         <input type="text" name="skill">
      </div>
      <div>
        登録日 <input type="date" name="registrationDate">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form> -->

</body>

</html>