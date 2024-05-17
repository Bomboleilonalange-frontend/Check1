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
            <div class="orders-information">
                <?php
                $sql = "SELECT o.order_id, o.date, o.status FROM orders o WHERE o.user_id = '$user_id'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>
  <tr>
    <th>Номер заказа</th>
    <th>Статус</th>
    <th>Дата заказа</th>
  </tr>";

                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>
    <td>" . $row['order_id'] . "</td>
    <td>" . $row['status'] . "</td>
    <td>" . $row['date'] . "</td>
  </tr>";
                    }

                    echo "</table>";
                }
                mysqli_close($con);
                ?>
            </div>
        </div>
    </section>
</body>

</html>