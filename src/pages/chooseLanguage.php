<?php
session_start();

if (isset($_SESSION['lang'])) {
    header('location: ../../');
}

include "../../templates/head.php";
?>
<form method="POST" action="../settings/setLanguage.php" class="wrapper d-flex justify-content-center align-items-center" style="height: 100vh;">
    <button class="mr-2" type="submit" name="lang" value="ua">
        <div class="card">
            <img src="../../public/assets/Flag_of_Ukraine.svg" class="card-img-top">
        </div>
    </button>
    <button class="mr-2" type="submit" name="lang" value="ru">
        <div class="card">
            <img src="../../public/assets/Flag_of_Russia.svg" class="card-img-top">
        </div>
    </button>
    <button type="submit" name="lang" value="en">
        <div class="card">
            <img src="../../public/assets/Flag_of_the_United_Kingdom.svg" class="card-img-top">
        </div>
    </button>
</form>

<style>
    form button {
        width: 300px;
        border: 2px solid #fff;
        padding: 0;
        transition: all .1s linear;
    }

    form button div {
        margin: 0 !important;

    }

    form button:hover {
        border: 2px solid gray;
        border-radius: 5px;
    }

    @media(max-width: 668px) {
        .wrapper {
            flex-direction: column;
        }

        form button {
            margin: 0 0 30px 0 !important;
        }
    }
</style>
<?php

include "../../templates/footer.php";
?>