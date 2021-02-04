<?php
// 送信データのチェック
// var_dump($_GET);
// exit();
session_start();

// 関数ファイルの読み込み
include("functions.php");
check_session_id();

$id = $_GET["id"];

$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM todo_table WHERE id=:id';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は指定の11レコードを取得
  // fetch()関数でSQLで取得したレコードを取得できる
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>SITE BOOK ❘ 完了報告編集</title>
</head>

<body>
  <form action="todo_update.php" method="POST">
    <fieldset>
      <legend class="p-3 mb-2 bg-info text-white">SITE BOOK ❘ 完了報告編集</legend>
     
      <div class="d-flex justify-content-start">
          <div class="p-2 bd-highlight"><a href="todo_input.php">完了報告作成</a></div>
          <div class="p-2 bd-highlight"><a href="todo_read.php">工事状況一覧</a></div>
          <div class="p-2 bd-highlight">案件一覧</div>
          <div class="p-2 bd-highlight">進捗管理表</div>
          <div class="p-2 bd-highlight">チャット</div>
      </div>



      <div>
        工事名: <input type="text" name="todo" value="<?= $record["todo"] ?>">
      </div>
      <div>
        完了日: <input type="date" name="deadline" value="<?= $record["deadline"] ?>">
      </div>
      <div>
        <button>保存する</button>
      </div>
      <input type="hidden" name="id" value="<?= $record["id"] ?>">
    </fieldset>
  </form>

</body>

</html>