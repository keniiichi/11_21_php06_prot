<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>SITE BOOK❘ユーザ登録</title>
</head>

<body>
  <form action="todo_register_act.php" method="POST">
    <fieldset>
      <legend class="p-3 mb-2 bg-info text-white">SITE BOOK❘ユーザ登録</legend>
      <div>
        ユーザー名: <input type="text" name="username">
      </div>
      <div>
        パスワード: <input type="text" name="password">
      </div>
      <div>
        <button>登録する</button>
      </div>
      <a href="todo_login.php">ログイン</a>
    </fieldset>
  </form>

</body>

</html>