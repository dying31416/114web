<html>
    <head>
        <title>管理頁面</title>
        <meta charset="UTF-8">
        <script>
<?php
    if (isset($_GET["act"])) {
        $db = new mysqli("localhost", "root", "", "msgboard");
        switch ($_GET["act"]) {
            case "del":
                $db -> query("DELETE FROM account WHERE indo = '%s'", $_GET["id"]);
                break;
            case "chpw":
                $sql = sprintf("UPDATE account SET name='%s' WHERE idno = '%d'", password_hash($_GET["pw"], PASSWORD_DEFAULT), $_GET["id"]);
                $db->query($sql);
                break;
        }
        printf("location.href='mysql_login.php';");
    }
?>
    function del(id) {
        if (confirm("確定要刪除嗎？")) {
            location.href = `?act=del&id=${id}`;
        }
    }

    function chpw(id) {
        if (comfirm("確定要修改密碼嗎？")) {
            pw = prompt("請輸入新密碼：");
            if (pw != null) {
                location.href = `?act=chpw&id=${id}&pw=${pw}`;
            }
        }
    }
    </script>
</head>
