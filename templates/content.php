<?php
session_start();
$root = $_SERVER["DOCUMENT_ROOT"];
include_once  $root . "/src/db.php";

$id = $_SESSION['id'];
$userInfo = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$id'");
$user = mysqli_fetch_assoc($userInfo);

?>

<div class="container">
    <div class="alert alert-primary mt-4" role="alert">
        <?php echo $userRole->userGreeting($_SESSION['lang']); ?>
    </div>
    <div class="d-inline-flex flex-column">
        
    </div>
</div>