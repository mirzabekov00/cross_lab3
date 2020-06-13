<?php

$translate = [
    'ru' => "Выход",
    'en' => "Exit",
    'ua' => "Вихiд",
]
?>

<nav class="navbar navbar-light bg-light shadow-sm  rounded">
    <div class="container d-flex">
        <a class="navbar-brand" href="http://lab3"><?php echo $name . " " . $surname; ?></a>

        <div class="d-flex align-items-center">
            <div style="<?php if ($_SESSION['lang'] == 'ru') {
                            echo 'width: 193px;';
                        } else if ($_SESSION['lang'] == 'en') {
                            echo 'width: 110px;';
                        } else {
                            echo 'width: 180px;';
                        } ?>" class="mr-3">
                <?php if ($user['role'] > 1) {
                    echo $userRole->privilegy($_SESSION['lang']);
                } ?>
            </div>
            <select style="width: 150px;" class="custom-select change-language mr-3">
                <option <?php if ($_SESSION['lang'] == 'ru') echo "selected"; ?> value="ru">Русский</option>
                <option <?php if ($_SESSION['lang'] == 'en') echo "selected"; ?> value="en">English</option>
                <option <?php if ($_SESSION['lang'] == 'ua') echo "selected"; ?> value="ua">Український</option>
            </select>
            <form action="../authorization/logout.php" method="POST"><button class="btn logout btn-primary" name="exit" type="submit"><?php echo $translate[$_SESSION['lang']]; ?></button></form>
        </div>
    </div>
</nav>