<html>
    <head>
        <title>註冊會員</title>
        <meta charset="UTF-8">
        <script>
<?php
    if (isset($_POST["acct"])) {
        $db = new mysqli("localhost", "root", "", "msgboard");
        $sql - sprintf("SELECT * FROM account WHERE acct='%s'", $_POST["acct"]);
        $result = $db->query($sql);
        if ($result->num_rows <= 0) {
            printf("alert('無會員資料，請通知管理員！');\n");
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($_POST["pass"], $row["pass"])) {
                printf("alert('歡迎登入，%s');", $row["name"]);
                printf("location.href='mysql_reg.php';\n");
            } else {
                printf("alert('密碼錯誤！');");
            }
        } 
    }
?>
        </script>
    </head>
    <body>
        <h1>註冊會員</h1>
        <form method="POST">
            <p>帳　　號：<input type="text" name="acct"></p>
            <p>密　　碼：<input type="password" name="pass"></p>
            <p><input type="submit" value="登入"></p>
        </form>
    </body>
</html>