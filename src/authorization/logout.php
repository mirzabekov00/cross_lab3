<?php
session_start();
if (isset($_POST['exit'])) {
    session_destroy();
    header("Location: ../../");
} else {
    header("Location: ../../");
}
