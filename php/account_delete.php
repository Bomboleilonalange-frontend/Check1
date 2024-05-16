<?php
require 'connect.php';
session_start();

if(!isset($_SESSION['user_id'])){
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM users WHERE id ='$user_id'";

if(!mysqli_query($con, $sql)){
    exit();
}
echo 'Аккаунт удален';
session_destroy();
header("Refresh: 1; URL = ../index.php");
$con ->close();

?>