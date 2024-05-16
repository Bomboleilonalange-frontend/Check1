<?php
require 'connect.php';
session_start();
$Login = $_POST['Login'];
$Password = $_POST['Password'];
$FIO = $_POST['FIO'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];
$Hach = password_hash($Password, PASSWORD_DEFAULT);
$query = "SELECT * FROM users WHERE Login = '$Login' OR Email = '$Email'";
$user = mysqli_fetch_assoc(mysqli_query($con, $query));
if (empty($user)) {
    $sql = "INSERT INTO users (Login, Password, FIO, Phone, Email) VALUES ('$Login', '$Hach', '$FIO', '$Phone', '$Email')";
    if ($con->query($sql) === TRUE) {
        echo 'Регистрация прошла успешно';
        header("Refresh: 2; URl = ../auth.php");
    }
} else {
    echo 'Пользователь с таким логином или email уже существует';
}

mysqli_close($con);
