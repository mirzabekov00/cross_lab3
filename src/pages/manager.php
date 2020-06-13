<?php
session_start();
include "userInfo.php";

if ($role < 2) {
    exit(header('HTTP/1.0 403 Forbidden'));
}

include "../../templates/head.php";
include "../../templates/navbar.php";
include "../../templates/content.php";
include "../../templates/footer.php";
