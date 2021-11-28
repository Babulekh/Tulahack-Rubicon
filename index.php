<?php include './components/db.php'; ?>
<?php
if (isset($_COOKIE["id"])) {
    header("Location:Cabinet.php");
}
?>
    <title>Вход</title>
</head>

<body>
    <form method="post" action="./components/login.php">
        <label for="username">Имя пользователя: </label><input type="text" name="username">
        <label for="password">Пароль: </label><input type="password" name="password">
        <input type="submit" name="action" value="signin"><input type="submit" name="action" value="register">
    </form>
</body>
</html>



