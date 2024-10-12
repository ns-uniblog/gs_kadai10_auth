<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
  <h1>ログイン</h1>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_action.php" method="post">
  <label>ログインID<input type="text" name="lid"></label>
  <label>パスワード<input type="text" name="lpw"></label><br>
<button type="submit">ログイン</button>
</form>

<br>
<button type=“button” onclick="location.href='user.php'">ユーザー登録</button>
<button type=“button” class="back-button" onclick="location.href='index.php'">オーダー表に戻る</button>

</body>
</html>