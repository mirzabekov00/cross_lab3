<?php

$database = new Database();

class Database
{
    public $dbhost = "localhost";
    public $dblogin = "root";
    public $dbpassword = "123456";
    public $dbname = "cross_lab3";


    function connect()
    {
        $connection = mysqli_connect($this->dbhost, $this->dblogin, $this->dbpassword, $this->dbname);
        return $connection;
    }

    function checkData($column, $values)
    {
        $result = mysqli_query($this->connect(), "SELECT * FROM `users` WHERE `$column` = '$values'");
        return mysqli_num_rows($result);
    }
    function checkUser()
    {
        $mylogin = $_SESSION['user']['login'];
        $connect = mysqli_query($this->connect(), "SELECT * FROM `users` WHERE `login` = '$mylogin'");
        $result = mysqli_fetch_assoc($connect);
        return $result;
    }
}


