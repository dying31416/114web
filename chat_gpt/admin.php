<?php
$mysqli = new mysqli("localhost", "root", "", "msgboard");

$result = $mysqli->query("SELECT indo, name FROM account");
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>管理頁面</title></head>
<body>
<h2>所有會員資料</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>帳號</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['indo']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
