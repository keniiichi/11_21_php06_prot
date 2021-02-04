<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>SITE BOOK ❘ 完了報告作成</title>
</head>

<body>
  <form action="create_file.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend class="p-3 mb-2 bg-info text-white">SITE BOOK ❘ 完了報告作成</legend>

      <div class="d-flex justify-content-start">
        <div class="p-2 bd-highlight"><a href="todo_input.php">完了報告作成</a></div>
        <div class="p-2 bd-highlight"><a href="todo_read.php">工事状況一覧</a></div>
        <div class="p-2 bd-highlight">案件一覧</div>
        <div class="p-2 bd-highlight">進捗管理表</div>
        <div class="p-2 bd-highlight">チャット</div>
      </div>

      <div>
        工事名: <input type="text" name="todo">
      </div>
      <div>
        完了日: <input type="date" name="deadline">
      </div>
      <div>
        完了写真： <input type="file" name="upfile" accept="image/*" capture="camera">
      </div>
      <div>
        <button>シェアする</button>
      </div>
    </fieldset>
  </form>

</body>

</html>