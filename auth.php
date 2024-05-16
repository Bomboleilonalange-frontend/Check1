<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Авоська || Авторизация</title>
</head>

<body>
    <?php
    include 'header.php'
    ?>
    <main class="main">
        <h1 class="main_heading">Форма Авторизации</h1>
        <form class="reg_auth_form" action="php/auth_script.php" method="post">
            <label class="reg_auth_label" for="Login">Login</label>
            <input class="reg_auth_input" type="text" name="login"  required pattern="\w+">
            <label class="reg_auth_label" for="Password">Password</label>
            <input class="reg_auth_input" type="password" name="pass" required minlength="4">
            <button class="reg_auth_button" type="submit">Войти</button>
        </form>
    </main>
    <footer class="header_footer">
        <div class="logo">
            <a href="">Авоська</a>
        </div>
        <div>
            <p>Адрес: г Москва улица Академика Янгеля д43 к1</p>
        </div>
        <div>
            <p>Телефон: 89671651255</p>
            <p>Email: avoska@mail.ru</p>
        </div>
    </footer>
</body>

</html>