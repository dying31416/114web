<?php
$mysqli = new mysqli("localhost", "root", "", "msgboard");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = $_POST['account'] ?? '';
    $pass = $_POST['pass'] ?? '';

    $stmt = $mysqli->prepare("SELECT pass FROM account WHERE name = ?");
    $stmt->bind_param("s", $account);
    $stmt->execute();
    $stmt->bind_result($db_pass);

    if ($stmt->fetch() && password_verify($pass, $db_pass)) {
        echo "<script>alert('登入成功'); window.location.href='mysql_login.php';</script>";
    } else {
        echo "<script>alert('登入失敗'); window.location.href='mysql_login.php';</script>";
    }

    $stmt->close();
    $mysqli->close();
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>登入</title></head>
<body>
<h2>登入</h2>
<form method="post">
    帳號: <input type="text" name="account" required><br>
    密碼: <input type="password" name="pass" required><br>
    <button type="submit">登入</button>
</form>
</body>
</html>
