<?php

class User
{
    protected $name;
    protected $surname;
    function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    public function greeting()
    {
        $greeting = [
            "ru" => "Здравствуйте, ",
            "en" => "Hello, ",
            "ua" => "Добридень, ",
        ];
        return $greeting;
    }
}

class Admin  extends User
{
    public $translate = [
        'list' => [
            'ua' => "Список користувачiв",
            'en' => "List of users",
            'ru' => "Список пользователей",
        ],
        'create' => [
            'ua' => "Створити користувача",
            'en' => "Create user",
            'ru' => "Создать пользователя",
        ]
    ];

    public function userGreeting($lang)
    {
        $translate = [
            "ru" => parent::greeting()['ru'] . "админ " . $this->name . " " . $this->surname . ". Вы можете на сайте изменять, удалять и создавать клиентов.",
            "en" => parent::greeting()['en'] . "admin " . $this->name . " " . $this->surname . ". You can do everything on the site.",
            "ua" => parent::greeting()['ua'] . "адмiн " . $this->name . " " . $this->surname . ". Ви можете на сайті робити все.",
        ];
        return $translate[$lang];
    }
    public function privilegy($lang)
    {
        echo '<a href="http://lab3/src/privilege/list.php" class="btn btn-success  list">' . $this->translate['list'][$_SESSION['lang']] . '</a>';
    }
}

class Manager  extends User
{
    public $translate = [
        'list' => [
            'ua' => "Список користувачiв",
            'en' => "List of users",
            'ru' => "Список пользователей",
        ]
    ];
    public function userGreeting($lang)
    {
        $translate = [
            "ru" => parent::greeting()['ru'] . "менеджер " . $this->name . " " . $this->surname . ". Вы можете на сайте изменять, удалять и создавать клиентов.",
            "en" => parent::greeting()['en'] . "manager " . $this->name . " " . $this->surname . ". You can change, delete and create clients on the site.",
            "ua" => parent::greeting()['ua'] . "менеджер " . $this->name . " " . $this->surname . ". Ви можете на сайті змінювати, видаляти і створювати клієнтів.",
        ];
        return $translate[$lang];
    }

    public function privilegy($lang)
    {

        echo '<a href="http://lab3/src/privilege/list.php" class="btn btn-success  list">' . $this->translate['list'][$_SESSION['lang']] . '</a>';
    }
}

class Client extends  User
{
    public function userGreeting($lang)
    {
        $translate = [
            "ru" => parent::greeting()['ru'] . "клиент " . $this->name . " " . $this->surname . ". Вы можете на сайте просматривать информацию доступную пользователям.",
            "en" => parent::greeting()['en'] . "client " . $this->name . " " . $this->surname . ". You can view information available to users on the site.",
            "ua" => parent::greeting()['ua'] . "клієнт " . $this->name . " " . $this->surname . ". Ви можете на сайті переглядати інформацію доступну користувачам.",
        ];
        return $translate[$lang];
    }
}
