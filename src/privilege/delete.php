<?php
session_start();
include_once "../db.php";

$id = $_POST['id'];
$user = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$id'");
$userInfo = mysqli_fetch_assoc($user);

$db = mysqli_query($database->connect(), "DELETE FROM `users` WHERE `id` = '$id'");

$_SESSION['message'] = 'Пользователь ' . $userInfo['name'] . ' ' . $userInfo['surname'] . ' успешно удален.';
