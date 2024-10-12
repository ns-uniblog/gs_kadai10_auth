<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- Main[Start] -->
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <h1>ユーザー登録</h1>
     <label>名前<input type="text" name="name"></label>
     <label>ログインID<input type="text" name="lid"></label>
     <label>パスワード<input type="text" name="lpw"></label>
     <!-- <label>管理FLG： -->
      <!-- 一般<input type="radio" name="kanri_flg" value="0">　
      管理者<input type="radio" name="kanri_flg" value="1"> -->
    </label>
     <!-- <label>退会FLG：<input type="text" name="life_flg"></label><br> -->
     <button type="submit" value="送信">登録</button>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<br>
<button type=“button” onclick="location.href='login.php'">ログイン</button>
<button type=“button” class="back-button" onclick="location.href='index.php'">オーダー表に戻る</button>

</body>
</html>
