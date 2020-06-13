<?php
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
include_once  $root . "/src/roles/roles.php";
include_once  $root . "/src/db.php";

$id = $_SESSION['id'];

$user = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$id'");
if (mysqli_num_rows($user) > 0) {
    $infoUser = mysqli_fetch_assoc($user);

    $name = $infoUser['name'];
    $surname = $infoUser['surname'];
    $role = $infoUser['role'];

    switch ($role) {
        case 1: {
                $userRole = new Client($name, $surname);
                break;
            }
        case 2: {
                $userRole = new Manager($name, $surname);
                break;
            }
        case 3: {
                $userRole = new Admin($name, $surname);
                break;
            }
        default: {
                $userRole = new Client($name, $surname);
                break;
            }
    }
} else {
    header("Location: ../../");
}
