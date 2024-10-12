<?php
session_start(); // セッションを開始
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>オーダー表</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>オーダー表</h1>
    <form action="insert.php" method="post">
        <div>
            <label>名前</label>
            <input type="text" name="name" placeholder="サンプル太郎" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="sample-taro@gmail.com" required>
        </div>
        <div>
            <label>パスタ🍝600円</label>
            <input type="number" step="1" min="0" placeholder="0個" name="order_pasta">
        </div>
        <div>
            <label>ピザ🍕700円</label>
            <input type="number" step="1" min="0" placeholder="0個" name="order_pizza">
        </div>
        <div>
            <label>カレー🍛800円</label>
            <input type="number" step="1" min="0" placeholder="0個" name="order_curry">
        </div>
        <div>
            <label>備考</label>
            <textarea name="memo" rows="1" placeholder="ご要望があればご記入ください！"></textarea>
        </div>
        <button type="submit">送信</button>
    </form>

    <br>
    <h1>ユーザー登録</h1>
    <div>登録・ログインすると、送信履歴の編集・削除ができるようになります😉</div><br>
    <button type=“button” class="back-button" onclick="location.href='user.php'">ユーザー登録</button>
    <button type=“button” class="back-button"onclick="location.href='login.php'">ログイン</button>
    <button type=“button” class="back-button" onclick="location.href='logout.php'">ログアウト</button><br><br><br>
    <h1>送信履歴</h1>
    <table border="1">
        <tr>
            <th>日時</th>
            <th>名前</th>
            <th>Email</th>
            <th>パスタ🍝600円</th>
            <th>ピザ🍕700円</th>
            <th>カレー🍛800円</th>
            <th>合計金額</th>
            <th>備考</th>
            <th>更新</th>
        </tr>
        <?php
        include 'select.php';
        $orders = selectOrders();
        $totalPasta = $totalPizza = $totalCurry = $totalAmount = 0;

        foreach ($orders as $order) {
            $pastaCount = (int)$order['order_pasta'] ?: 0; // パスタの注文数
            $pizzaCount = (int)$order['order_pizza'] ?: 0; // ピザの注文数
            $curryCount = (int)$order['order_curry'] ?: 0; // カレーの注文数
        
            $total = ($pastaCount * 600) + ($pizzaCount * 700) + ($curryCount * 800);
            
            $totalPasta += $pastaCount;
            $totalPizza += $pizzaCount;
            $totalCurry += $curryCount;
            $totalAmount += $total;
        
            echo '<tr>';
            echo '<td>' . htmlspecialchars($order['date']) . '</td>'; // 日時
            echo '<td>' . htmlspecialchars($order['name']) . '</td>'; // 名前
            echo '<td>' . htmlspecialchars($order['email']) . '</td>'; // Email
            echo '<td>' . htmlspecialchars($pastaCount) . '</td>'; // パスタ
            echo '<td>' . htmlspecialchars($pizzaCount) . '</td>'; // ピザ
            echo '<td>' . htmlspecialchars($curryCount) . '</td>'; // カレー
            echo '<td>' . htmlspecialchars($total) . '円</td>'; // 合計金額
            echo '<td>' . htmlspecialchars($order['memo']) . '</td>'; // 備考
            echo '<td>'; // 操作カラム開始
            echo '<div class="button-group">';

            // ログイン状態のチェック
            if (isset($_SESSION['chk_ssid'])) {
            echo '<form class="form-button-group" action="update.php" method="get" style="display:inline;">';
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($order['id']) . '">';
            echo '<button type="submit">編集</button>';
            echo '</form>';
            echo '<form class="form-button-group" action="delete.php" method="post" style="display:inline;">';
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($order['id']) . '">';
            echo '<button type="submit">削除</button>';
            echo '</form>';
            echo '</div>';
            echo '</td>'; // 操作カラム終了
            echo '</tr>';
        }}
        
        // 合計金額の表示
        echo '<tr>';
        echo '<th colspan="3">合計</th>';
        echo '<td>' . htmlspecialchars($totalPasta) . '</td>';
        echo '<td>' . htmlspecialchars($totalPizza) . '</td>';
        echo '<td>' . htmlspecialchars($totalCurry) . '</td>';
        echo '<td>' . htmlspecialchars($totalAmount) . '円</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '</tr>';
        ?>
    </table>
</body>
</html>
