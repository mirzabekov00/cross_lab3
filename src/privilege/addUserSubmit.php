<?php
session_start();
include_once '../db.php';

$lang = $_POST['lang'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$password = md5($_POST['password']);
$role = $_POST['role'];
$login = $_POST['login'];
$id = $_POST['number'];

$translater = [
    'message' => [
        'ru' => 'Пользователь был успешно добавлен.',
        'en' => 'User has been successfully added.',
        'ua' => 'Користувач був успішно доданий.',
    ],
    'err' => [
        'ru' => 'Произошла ошибка, введены не все поля.',
        'en' => 'An error has occurred, not all fields have been entered.',
        'ua' => 'Сталася помилка, введені не всі поля.',
    ],
];

if (!empty($name) && !empty($surname) && !empty($_POST['password']) && !empty($login)) {
    $add = mysqli_query($database->connect(), "INSERT INTO `users`(`id`, `login`,`password`, `name`, `surname`, `lang`, `role`) VALUES (NULL,'$login','$password','$name','$surname', '$lang', '$role')");
    $_SESSION['message'] = $translater['message'][$_SESSION['lang']];
} else {
    $_SESSION['err'] = $translater['err'][$_SESSION['lang']];
}

header('location: http://lab3/src/privilege/list.php');
