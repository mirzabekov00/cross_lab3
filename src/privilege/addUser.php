<?php
session_start();
include "../pages/userInfo.php";

include_once "../db.php";

if ($role < 3) {
    exit(header('HTTP/1.0 403 Forbidden'));
}

$translater = [
    'title' => [
        'ru' => 'Добавить пользователя',
        'en' => 'Add user',
        'ua' => 'Додати користувача',
    ],
    'name' => [
        'ru' => 'Введите имя',
        'en' => 'Enter a name',
        'ua' => 'Введіть ім`я',
    ],
    'surname' => [
        'ru' => 'Введите фамилию',
        'en' => 'Enter last name',
        'ua' => 'Введіть прізвище',
    ],
    'login' => [
        'ru' => 'Введите логин',
        'en' => 'Enter login',
        'ua' => 'Введіть логін',
    ],
    'pass' => [
        'ru' => 'Введите пароль',
        'en' => 'Enter password',
        'ua' => 'Введіть пароль',
    ],
    'lang' => [
        'ru' => 'Выберите язык',
        'en' => 'Choose language',
        'ua' => 'Виберіть мову',
        'select' => [
            'ru' => ['Русский', 'Английский', 'Украинский'],
            'en' => ['Russian', 'English', 'Ukrainian'],
            'ua' => ['Русский', 'Англійська', 'Український'],
        ]
    ],
    'role' => [
        'ru' => 'Выберите роль',
        'en' => 'Choose role',
        'ua' => 'Виберіть роль',
        'select' => [
            'ru' => ['Клиент', 'Менеджер', 'Администратор'],
            'en' => ['Client', 'Manager', 'Admin'],
            'ua' => ['Клієнт', 'Менеджер', 'Адміністратор'],
        ]
    ],

];
include "../../templates/head.php";
include "../../templates/navbar.php";
?>

<div class="container">
    <div class="form-auth-inner shadow p-5 bg-white rounded mt-4">
        <h3><?php echo $translater['title'][$_SESSION['lang']] . ' ' . $currentUser['name'] . ' ' . $currentUser['surname']; ?></h3>
        <form method="POST" action="addUserSubmit.php">
            <div class="form-group">
                <label><?php echo $translater['name'][$_SESSION['lang']] ?></label>
                <input type="text" class="form-control error" name="name">
            </div>
            <div class="form-group">
                <label><?php echo $translater['surname'][$_SESSION['lang']] ?></label>
                <input type="text" class="form-control" name="surname">
            </div>
            <div class="form-group">
                <label><?php echo $translater['login'][$_SESSION['lang']] ?></label>
                <input type="text" class="form-control" name="login">
            </div>
            <div class="form-group">
                <label><?php echo $translater['pass'][$_SESSION['lang']] ?></label>
                <input type="text" class="form-control" name="password">
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
