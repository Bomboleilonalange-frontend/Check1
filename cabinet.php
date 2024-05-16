<?php
require 'php/connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo 'Авторизируйтесь для входа в личный кабинет';
    header("Refresh: 2; ../auth.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $row = $result->fetch_assoc();
} else {
    echo 'Ошибка в получении данных';
    exit();
}

// Ошибка в деталях в показе кода сейчас помню а потом могу не вспомнить.

?>

<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <section>
        <h1>Личный кабинет</h1>
        <div>
            <h3>Данные о пользователе</h3>
            <div>
                <p>Логин: <?= $row['Login'] ?> </p>
                <p>ФИО: <?= $row['FIO'] ?> </p>
                <p>Телефон: <?= $row['Phone'] ?> </p>
                <p>Email: <?= $row['Email'] ?> </p>
                <p><a href="index.php">Главная</a></p>
                <p><a href="php/logout.php">Выход</a></p>
                <p><a href="php/account_delete.php">Удаление аккаунта</a></p>
            </div>
        </div>
    </section>
</body>

</html>