<?php

class Signup
{
    private $email;
    private $login;
    private $password;
    private $name;
    private $surname;

    function __construct($email, $login, $password, $name, $surname)
    {
        $this->email = $email;
        $this->login = $login;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->name = $name;
        $this->surname = $surname;
    }

    public function signup()
    {

//        при занятости логина возвращаем ошибку
        if ($this->checkLogin()) {
            $_SESSION['logged'] = 'signup';
            header("Location: error.php");
            return false;
        } else {

//            при успешном добавлении пользователя возвращаемя на главную
            if ($this->addUser()) {
                $_SESSION['login'] = $this->login;
                header("Location: index.php");
                return true;
            } else {
                $_SESSION['logged'] = 'signup';
                header("Location: error.php");
                return false;
            }
        }
    }

//    добавляем данные нового пользователя в БД
    private function addUser()
    {
        $db = Connection::instance();
        $sql = ("INSERT INTO `users`(`email`, `login`, `password`, `name`, `surname`) VALUES(?,?,?,?,?)");
        $query = $db->prepare($sql);
        $query->execute(array($this->email, $this->login, $this->password, $this->name, $this->surname));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    //возвращает true если логин занят
    private function checkLogin()
    {
        $db = Connection::instance();
        $sql = ("SELECT * FROM `users` WHERE `login` = :login");
        $query = $db->prepare($sql);
        $query->bindValue(':login', $this->login);
        $query->execute();
        $loginFromDB = $query->fetch();

        if ($loginFromDB) {
            return true;
        } else {
            return false;
        }
    }
}