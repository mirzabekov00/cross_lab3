<?php
session_start();
include "../pages/userInfo.php";

include_once '../db.php';

if ($role < 2) {
    exit(header('HTTP/1.0 403 Forbidden'));
}

$ids = $_GET['id'];

$userInfo = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$ids'");
$currentUser = mysqli_fetch_assoc($userInfo);

if ($currentUser['role'] == 3) {
    exit(header('HTTP/1.0 403 Forbidden'));
}

$translater = [
    'title' => [
        'ru' => 'Редактировать пользователя',
        'en' => 'Edit user',
        'ua' => 'Редагувати користувача',
    ],
    'name' => [
        'ru' => 'Введите новое имя',
        'en' => 'Enter a new name',
        'ua' => 'Введіть нове ім`я',
    ],
    'surname' => [
        'ru' => 'Введите новую фамилию',
        'en' => 'Enter a new last name',
        'ua' => 'Введіть нове прізвище',
    ],
    'login' => [
        'ru' => 'Введите новый логин',
        'en' => 'Enter new login',
        'ua' => 'Введіть новий логін',
    ],
    'lang' => [
        'ru' => 'Выберите новый язык',
        'en' => 'Choose a new language',
        'ua' => 'Виберіть нову мову',
        'select' => [
            'ru' => ['Русский', 'Английский', 'Украинский'],
            'en' => ['Russian', 'English', 'Ukrainian'],
            'ua' => ['Русский', 'Англійська', 'Український'],
        ]
    ],
    'role' => [
        'ru' => 'Выберите новую роль',
        'en' => 'Choose a new role',
        'ua' => 'Виберіть нову роль',
        'select' => [
            'ru' => ['Клиент', 'Менеджер', 'Администратор'],
            'en' => ['Client', 'Manager', 'Admin'],
            'ua' => ['Клієнт', 'Менеджер', 'Адміністратор'],
        ]
    ],

];
if (!isset($currentUser)) {
    header('location: ../../index.php');
}

include "../../templates/head.php";
include "../../templates/navbar.php";



?>
<div class="container">
    <div class="form-auth-inner shadow p-5 bg-white rounded mt-4">
        <h3><?php echo $translater['title'][$_SESSION['lang']] . ' ' . $currentUser['name'] . ' ' . $currentUser['surname']; ?></h3>
        <form method="POST" action="editUser.php">
            <div class="form-group">
                <label><?php echo $translater['name'][$_SESSION['lang']] ?></label>
                <input value="<?php echo $currentUser['name'] ?>" type="text" class="form-control error" name="name">
            </div>
            <div class="form-group">
                <label><?php echo $translater['surname'][$_SESSION['lang']] ?></label>
                <input value="<?php echo $currentUser['surname'] ?>" type="text" class="form-control" name="surname">
            </div>
            <div class="form-group">
                <label><?php echo $translater['login'][$_SESSION['lang']] ?></label>
                <input value="<?php echo $currentUser['login'] ?>" type="text" class="form-control" name="login">
            </div>
            <div class="form-group">
                <label><?php echo $translater['lang'][$_SESSION['lang']] ?></label>
                <select class="custom-select" name="lang">
                    <option <?php if ($currentUser['lang'] == 'ru') echo "selected"; ?> value="ru"><?php echo $translater['lang']['select'][$_SESSION['lang']][0] ?></option>
                    <option <?php if ($currentUser['lang'] == 'en') echo "selected"; ?> value="en"><?php echo $translater['lang']['select'][$_SESSION['lang']][1] ?></option>
                    <option <?php if ($currentUser['lang'] == 'ua') echo "selected"; ?> value="ua"><?php echo $translater['lang']['select'][$_SESSION['lang']][2] ?></option>
                </select>
            </div>
            <div class="form-group">
                <label><?php echo $translater['role'][$_SESSION['lang']] ?></label>
                <select class="custom-select" name="role">
                    <option <?php if ($currentUser['role'] == '1') echo "selected"; ?> value="1"><?php echo $translater['role']['select'][$_SESSION['lang']][0] ?></option>
                    <option <?php if ($currentUser['role'] == '2') echo "selected"; ?> value="2"><?php echo $translater['role']['select'][$_SESSION['lang']][1] ?></option>
                    <option <?php if ($currentUser['role'] == '3') echo "selected"; ?> value="3"><?php echo $translater['role']['select'][$_SESSION['lang']][2] ?></option>
                </select>
            </div>
            <div class="form-group text-right">
                <a href="http://lab3/src/privilege/list.php" class="btn btn-outline-secondary">Отмена</a>
                <button name='number' value="<?php echo $ids; ?>" type="submit" class="btn btn-success text-white">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<?php
include "../../templates/footer.php";
