<?php

// ●●●●●●●●●●●●　Web参照　●●●●●●●●●●●●●●●●●
// https://qiita.com/wakahara3/items/4bf9e00e0896477897e6

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

try{
$stmt = $pdo->prepare('DELETE FROM joblist_table WHERE id = :id');//idはdeliteに飛ぶリンクで引っ張ってくる
$stmt->execute(array(':id' => $_GET["id"]));//$_POSTでは消えなかった。$_GETじゃないとダメみたい。何故？

echo "削除しました。";

} catch (Exception $e) {
          echo 'エラーが発生しました。:' . $e->getMessage();
}

// $status = $stmt->execute(); // SQLを実行 **エラーが起きていたのはMySQLの問題だった

// var_dump($status);
// exit();

// print_r($e);

// if ($status == false) {
//   $error = $stmt->errorInfo();
//   exit('sqlError:' . $error[2]);
// } else {
//   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   $output = "";
// }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>削除完了</title>
  </head>
  <body>          
  <p>
      <a href="joblist_read.php">投稿一覧へ</a>
  </p> 
  </body>
</html>