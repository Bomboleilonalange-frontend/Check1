<?php 
require 'connect.php';
session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];

$query = "SELECT * FROM users WHERE Login = '$login'";
$user = mysqli_fetch_assoc(mysqli_query($con, $query));

if(!$user){
    echo 'Пользователь не найден';
    exit();
}

if(!password_verify($pass, $user['Password'])){
    echo 'Неверный пароль';
    exit();
}

$_SESSION['user_id'] = $user['user_id'];
$_SESSION['login'] = $user['Login'];

if(!isset($_SESSION['user_id'])){
    echo 'Сессия не открыта';
    exit();
}

echo 'Авторизация прошла успешно';
header("Refresh: 2; URL = ../cabinet.php");
?>


