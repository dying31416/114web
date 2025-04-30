<?php
$mysqli = new mysqli("localhost", "root", "", "msgboard");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $account = $_POST['account'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if (empty($name) || empty($account) || empty($pass) || $pass !== $confirm) {
        echo "<script>alert('註冊失敗，請確認資料填寫正確'); window.location.href='mysql_reg.php';</script>";
        exit;
    }

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("INSERT INTO account(name, pass) VALUES (?, ?)");
    $stmt->bind_param("ss", $account, $hashed_pass);
    
    if ($stmt->execute()) {
        echo "<script>alert('註冊成功'); window.location.href='mysql_login.php';</script>";
    } else {
        echo "<script>alert('註冊失敗'); window.location.href='mysql_reg.php';</script>";
    }
    $stmt->close();
    $mysqli->close();
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>註冊</title></head>
<body>
<h2>註冊帳號</h2>
<form method="post">
    姓名: <input type="text" name="name" required><br>
    帳號: <input type="text" name="account" required><br>
    密碼: <input type="password" name="pass" required><br>
    確認密碼: <input type="password" name="confirm" required><br>
    <button type="submit">註冊</button>
</form>
</body>
</html>
