<?php
require 'connect.php';
session_start();

// Проверяем, есть ли user_id в сессии
if (!isset($_SESSION['user_id'])) {
    // Если user_id не установлен, выводим сообщение и прекращаем выполнение скрипта
    echo "Пожалуйста, войдите в систему, чтобы добавить продукт в корзину.";
    exit;
}

$product_id = $_POST['product_id'];
$user_id = $_SESSION['user_id'];

// Выполнить SQL-запрос SELECT для проверки наличия товара в корзине для текущего пользователя
$sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
$result = mysqli_query($con, $sql);

if (!$result) {
    // Вывести сообщение об ошибке при проверке наличия товара в корзине
    echo 'Произошла ошибка при проверке наличия товара в корзине';
    exit;
}

// Если результат не пустой, то есть такой товар уже есть в корзине
if (mysqli_num_rows($result) > 0) {
    // Выполнить SQL-запрос UPDATE для увеличения значения quantity на единицу
    $sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = $user_id AND product_id = $product_id";
} else {
    // Если результат пустой, то такого товара еще нет в корзине
    // Выполнить SQL-запрос INSERT для добавления новой записи о товаре и его количестве
    $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, 1)";
}

$result = mysqli_query($con, $sql);

if (!$result) {
    // Вывести сообщение об ошибке при обновлении или добавлении записи
    echo 'Произошла ошибка при обновлении или добавлении записи';
    exit;
}

// Перенаправить пользователя на страницу корзины
header('Location: ../cart.php');
?>
