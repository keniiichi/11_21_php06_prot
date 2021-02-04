<?php
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['id']; //

// DB接続
$pdo = connect_to_db();

// いいね数カウント
// データ取得SQL作成
// $sql = "SELECT * FROM todo_table";
$sql = 'SELECT * FROM todo_table
LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS cnt
FROM like_table GROUP BY todo_id) AS likes
ON todo_table.id = likes.todo_id';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["deadline"]}</td>";
    $output .= "<td>{$record["todo"]}</td>";
    // edit deleteリンクを追加
    $output .= "<td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>ありがとう{$record["cnt"]}</a></td>";
    $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>編集</a></td>";
    $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>削除</a></td>";
    // 画像出力を追加
    $output .= "<td><img src='{$record["image"]}' height=150px></td>";
    $output .= "</tr>";
  }
  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($value);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>SITE BOOK ❘ 工事状況一覧</title>
</head>

<body>
  <fieldset>
    <legend class="p-3 mb-2 bg-info text-white">SITE BOOK ❘ 工事状況一覧</legend>
    
    <div class="d-flex justify-content-start">
      <div class="p-2 bd-highlight"><a href="todo_input.php">完了報告作成</a></div>
      <div class="p-2 bd-highlight"><a href="todo_read.php">工事状況一覧</a></div>
      <div class="p-2 bd-highlight">案件一覧</div>
      <div class="p-2 bd-highlight">進捗管理表</div>
      <div class="p-2 bd-highlight">チャット</div>
      <div class="p-2 bd-highlight"><a href="todo_logout.php">ログアウト</a></div>
    </div>


    <table>
      <thead>
        <tr>
          <th>完了日</th>
          <th>工事名</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>

  <!-- bootstrap Javascript-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>