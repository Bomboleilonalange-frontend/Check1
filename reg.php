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
    <title>Авоська || Регистрация</title>
</head>

<body>
    <?php
    include 'header.php'
    ?>
    <main class="main">
        <h1 class="main_heading">Форма Регистрации</h1>
        <form class="reg_auth_form" action="php/reg_script.php" method="post">
            <label class="reg_auth_label" for="Login">Login</label>
            <input class="reg_auth_input" type="text" name="Login" required pattern="\w+">
            <label class="reg_auth_label" for="Password">Password</label>
            <input class="reg_auth_input" type="password" name="Password" required minlength="4">
            <label class="reg_auth_label" for="FIO">FIO</label>
            <input class="reg_auth_input" type="text" name="FIO" required pattern="[а-яА-ЯёЁ\s]+">
            <label class="reg_auth_label" for="Phone">Phone</label>
            <input class="reg_auth_input" type="tel" name="Phone" required pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}">
            <label class="reg_auth_label" for="Email">Email</label>
            <input class="reg_auth_input" type="email" name="Email" required>
            <button class="reg_auth_button" type="submit">Зарегестрироваться</button>
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