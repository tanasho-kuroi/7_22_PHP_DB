<?php

// 「dbname」「port」「host」「username」「password」を設定
$dbn //DB,port, host 紐付け(gsacf_d07_22 が自分のDB名. 変えたのそこだけ)
  = 'mysql:dbname=gsacf_d07_22;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = ''; // （空文字）
try { //例外を投げる。これに当てはまらない(＝つまり例外)についての処理はcatchで行う
  $pdo = new PDO($dbn, $user, $pwd); //PDO:DBサーバとPHPの通信、
} catch (PDOException $e) { //DBサーバとPHPの通信がうまくいかない場合は
  echo json_encode(["db error" => "{$e->getMessage()}"]); //getMessage例外時のメッセージ
  exit();
}
// 「db error:...」が表示されたらdb接続でエラーが発生していることがわかる．
// ->: アロー演算子。PDOExceptionクラスから、getMessageを引っ張ってくる??
// =>: わからん！！

// SQL作成&実行,データを引っ張ってくるテーブル名を指定する。  (SQL: DBの操作のための言語)
$sql = 'SELECT * FROM joblist_table';
// ↓下記はcreate時の一文。read時は上の一文。ここ間違っていてエラー起きていた。
//  $sql = 'INSERT INTO joblist_table(id, joblist, skill, region, resistDate, created_at, updated_at)VALUES(NULL, :joblist, :skill, :region, :resistDate, sysdate(), sysdate())';
// この時は単に'SELECT * FROM joblist_table'という文字列を$sqlで定義しているだけ


$stmt = $pdo->prepare($sql); //PDOクラスのprepareを引っ張ってくる

// var_dump($stmt);//object(PDOStatement)#2 (1) { ["queryString"]=> string(27) "SELECT * FROM joblist_table" }
// exit();

// バインド変数を設定
$stmt->bindValue(':joblist', $joblist, PDO::PARAM_STR); //PDOクラスのbindValueを引っ張ってくる
$stmt->bindValue(':skill', $skill, PDO::PARAM_STR); 
$stmt->bindValue(':region', $region, PDO::PARAM_STR); 
$stmt->bindValue(':resistDate', $resistDate, PDO::PARAM_STR);


$status = $stmt->execute(); // SQLを実行 **エラーが起きていたのはMySQLの問題だった

// var_dump($status);//bool
// exit();

print_r($e);

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);//fetchAll 全てのデータを配列として格納する
  $output = "";

// var_dump($result);//配列が全て入る
// exit();

  foreach ($result as $record) {
    $output .= "<tr>"; //.=は追加していく演算子
    $output .= "<td>{$record["resistDate"]}</td>";
    $output .= "<td>{$record["joblist"]}</td>";
    $output .= "<td>{$record["skill"]}</td>";
    $output .= "<td>{$record["region"]}</td>";
    $output .= "<td><a href=joblist_delete.php?id={$record["id"]}>削除</a>\n</td>";
    $output .= "</tr>";
    //  ↓HTMLに<tr><td>resistDate</td><td>joblist</td>....<tr>の形でデータが入る 
  }

      // $output .= "<td><a href=joblist_deleteall.php}>全削除</a>\n</td>";

}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型joblist（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>DB連携型joblist（一覧画面）</legend>
    <a href="joblist_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>resistDate</th>
          <th>joblist</th>
          <th>skill</th>
          <th>region</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>resistDate</td><td>joblist</td>....<tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>

    </table>
         <a href="joblist_deleteall.php">全削除</a>

  </fieldset>
</body>

</html>