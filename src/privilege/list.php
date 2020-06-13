<?php
session_start();

include "../pages/userInfo.php";

if ($role < 2) {
    exit(header('HTTP/1.0 403 Forbidden'));
}
include_once "../db.php";
include "../../templates/head.php";
include "../../templates/navbar.php";



$translate = [
    'thead' => [
        'ru' => [
            'ID', 'Логин', 'Имя', 'Фамилия', 'Язык', 'Роль', "Действие"
        ],
        'ua' => [
            'ID', 'Логiн', "Iм'я", 'Прiзвище', 'Мова', 'Роль', "Дiя"
        ],
        'en' => [
            'ID', 'Login', 'Name', 'Surname', 'Language', 'Role', "Action"
        ],
    ],
    'lang' => [
        'ru' => [
            'rus' => 'Русский',
            'eng' => 'Английский',
            'ukr' => 'Украинский',
            'no' => "Не выбрано"
        ],
        'ua' => [
            'rus' => 'Росiйська',
            'eng' => 'Англiйська',
            'ukr' => 'Українська',
            'no' => "Не вибрано"
        ],
        'en' => [
            'rus' => 'Russian',
            'eng' => 'English',
            'ukr' => 'Ukrainian',
            'no' => "Not chosen"
        ],
    ],
    'role' => [
        'ru' => [
            'adm' => 'Администратор',
            'man' => 'Менеджер',
            'cli' => 'Клиент',
        ],
        'ua' => [
            'adm' => 'Адмiнiстратор',
            'man' => 'Менеджер',
            'cli' => 'Клієнт',
        ],
        'en' => [
            'adm' => 'Admin',
            'man' => 'Manager',
            'cli' => 'Client',
        ],
    ]
];

?>

<div class="container">
    <div class="form-auth-inner shadow px-5 pt-2 pb-5 bg-white rounded mt-4">
        <h3 class="text-center mt-3"><?php echo $userRole->translate['list'][$_SESSION['lang']] ?></h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-success mt-1 mes" role="alert">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        } else if (isset($_SESSION['err'])) {
            echo '<div class="alert alert-danger mt-1 mes" role="alert">' . $_SESSION['err'] . '</div>';
            unset($_SESSION['err']);
        }
        ?>
        <table class="table  mt-4">
            <thead>
                <tr>
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                        echo "<th scope='col'>" . $translate['thead'][$_SESSION['lang']][$i] . "</th>";
                    }
                    if ($role === "3") {
                        echo '<th scope="col">' . $translate['thead'][$_SESSION['lang']][6] . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = mysqli_query($database->connect(), "SELECT * FROM `users`");
                foreach ($users as $key => $user) {
                    echo '<tr';
                    if ($user['id'] == $_SESSION['id']) {
                        echo ' class="bg-primary text-white"';
                    }
                    echo '>';
                    foreach ($user as $key => $ass) {
                        if ($key === 'lang') {
                            echo "<td>";
                            switch ($user[$key]) {
                                case 'ru': {
                                        echo $translate['lang'][$_SESSION['lang']]['rus'];
                                        break;
                                    }
                                case 'ua': {
                                        echo $translate['lang'][$_SESSION['lang']]['ukr'];
                                        break;
                                    }
                                case 'en': {
                                        echo $translate['lang'][$_SESSION['lang']]['eng'];
                                        break;
                                    }
                                case "": {
                                        echo $translate['lang'][$_SESSION['lang']]['no'];
                                        break;
                                    }
                            }
                            echo "</td>";
                            continue;
                        }
                        if ($key === 'role') {
                            echo "<td>";
                            switch ($user[$key]) {
                                case 1: {
                                        echo $translate['role'][$_SESSION['lang']]['cli'];
                                        break;
                                    }
                                case 2: {
                                        echo $translate['role'][$_SESSION['lang']]['man'];
                                        break;
                                    }
                                case 3: {
                                        echo $translate['role'][$_SESSION['lang']]['adm'];
                                        break;
                                    }
                            }
                            echo "</td>";
                            continue;
                        }

                        if ($key !== 'password') {
                            echo "<td>";
                            print_r($user[$key]);
                            echo "</td>";
                        }
                    }

                    if ($role === "3" && $_SESSION['id'] !== $user['id'] && $user['role'] !== "3") {
                        echo "<td class='pl-0 pb-0 d-flex' style='padding-top: 4px;'>";
                        echo "<form><a href='http://lab3/src/privilege/edit.php?id=" . $user['id'] . "' class='btn d-flex edit-user' value='" . $user['id'] . "'><img src='../../public/assets/pencil.svg' alt='delete' width='25'></a></form>";
                        echo "<button class='btn d-flex delete-user' value='" . $user['id'] . "'><img src='../../public/assets/criss-cross.svg' alt='delete' width='25'></button></td>";
                    } else {
                        echo '<td></td>';
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
        if ($role === "3") {
            echo '<a href="http://lab3/src/privilege/addUser.php" class="btn btn-block btn-outline-primary pt-1 pb-2" style="font-size: 25px;">+</a>';
        }
        ?>
        <style>
            .btn:focus {
                box-shadow: none;
            }

            .btn-outline-primary {
                color: #007bff !important;
            }

            .btn-outline-primary:hover {
                color: #fff !important;
            }
        </style>
    </div>
</div>
<?php
include '../../templates/footer.php';
