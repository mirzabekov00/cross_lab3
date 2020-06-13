<?php
require_once "./src/pages/userInfo.php";

if (isset($_SESSION['id'])) {
    switch ($role) {
        case "1": {
                header("location: /src/pages/client.php");
                break;
            }
        case "2": {
                header("location: /src/pages/manager.php");
                break;
            }
        case "3": {
                header("location: /src/pages/admin.php");
                break;
            }
    }
} else {
    header("location: /src/authorization/login.php");
}
    