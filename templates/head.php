<?php
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
include_once  $root . "/src/db.php";

$id = $_SESSION['id'];
$userInfo = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$id'");
$user = mysqli_fetch_assoc($userInfo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($_SESSION['id'])) {
                echo $user['name'] . ' ' . $user['surname'];
            } else {
                echo "Cross Labs";
            } ?></title>
    <link rel="shortcut icon" href="../../public/assets/user.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>