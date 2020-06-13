<?php
session_start();
include "../db.php";
include "../roles/roles.php";

$login = $_POST['login'];
$password = md5($_POST['password']);

$checkuser = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

if (mysqli_num_rows($checkuser) > 0) {
    $user = mysqli_fetch_assoc($checkuser);
    $_SESSION['id'] = $user['id'];

    if (!empty($user['lang'])) {
        $_SESSION['lang'] = $user['lang'];
        header("location: ../..");
    } else {
        header("location: ../pages/chooseLanguage.php");
    }
} else {
    if ($database->checkData('login', $login) === 0) {
        $_SESSION['message'] = "Пользователя не существует!";
        header('location: ../../index.php');
        exit;
    }
    if ($database->checkData('password', $password) === 0) {
        $_SESSION['message'] = "Вы ввели неверный пароль!";
        header('location: ../../index.php');
        exit;
    }
}
