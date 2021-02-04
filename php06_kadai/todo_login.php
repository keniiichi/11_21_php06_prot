<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>SITE BOOK ❘ ログイン</title>
</head>

<body>
  <form action="todo_login_act.php" method="POST">
    <fieldset>
      <legend class="p-3 mb-2 bg-info text-white">SITE BOOK ❘ ログイン</legend>
        <div>
          ユーザー名: <input type="text" name="username">
        </div>
        <div>
          パスワード: <input type="text" name="password">
        </div>
        <div>
          <button>ログイン</button>
        </div>
        <a href="todo_register.php"> ユーザー登録</a>
    </fieldset>
  </form>

</body>

</html>