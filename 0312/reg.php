<html>
    <head>
        <title>註冊會員</title>
        <meta charser="UTF-8">
        <script>
<?php
    if (isset($_POST["acct"])) {
        if (strcmp($_POST["pass1"], $_POST["pass2"])) {
            printf("alert('密碼不一致')");
        } else {
            $filename = "member.csv";
            $newmember = true;
            if (file_exists($filename)) {
                $fp = fopen($filename, "r");
                while ($member = fgetcsv($fp, 1000)) {
                    if (true) {

                    }
                }

                fclose($fp);
            }
        }
        
    }
?>
        </script>
    </head>
    <body>
        <H1>註冊會員</H1>
        <form method = "post">
            <p>帳　　號：<input type="text" name="acct"></p>
            <p>顯示名稱：<input type="text" name="name"></p>
            <p>密　　碼：<input type="password" name="pass1"></p>
            <p>確認密碼：<input type="password" name="pass2"></p>
            <p><input type="submit"></p>
        </form>
    </body>
</html>