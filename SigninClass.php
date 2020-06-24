<?php

class Signin
{
    //возвращает true если указанный логин есть в базе
    private function checkLogin($login)
    {
        $db = Connection::instance();
        $sql = ("SELECT * FROM `users` WHERE `login` = :login");
        $query = $db->prepare($sql);
        $query->bindValue(':login', $login);
        $query->execute();
        $loginFromDB = $query->fetchAll();

        if ($loginFromDB) {
            return true;
        } else {
            return false;
        }
    }

//    возвращает true если пароль для данного логина есть в базе
    private function checkPassword($login, $password)
    {
        $db = Connection::instance();
        $sql = ("SELECT * FROM `users` WHERE `login` = :login");
        $query = $db->prepare($sql);
        $query->bindValue(':login', $login);
        $query->execute();
        $passwordFromDB = $query->fetch();

        if (password_verify($password, $passwordFromDB['password'])) {
            return true;
        } else {
            return false;
        }
    }

//    при наличии логина и совпадении пароля возвращаемся на главную страницу
    public function entry($login, $password)
    {
        if ($this->checkLogin($login)) {
            if ($this->checkPassword($login, $password)) {
                $_SESSION['login'] = $login;
                header("Location: index.php");
                return true;
            } else {

//                при несовпадении пароля и логина с БД возвращаем ошибку
                $_SESSION['logged'] = 'signin';
                header("Location: error.php");
                return false;
            }
        } else {

//                при отсутствии логина в БД возвращаем ошибку
            $_SESSION['logged'] = 'signin';
            header("Location: error.php");
            return false;
        }
    }
}