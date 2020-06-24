<?php

//Класс для редактирования профиля

class EditClass {

//    получаем данные профиля из БД по логину

    public function getData($login)
    {
//        подключаемя к БД
        $db = Connection::instance();
        $sql = ("SELECT * FROM `users` WHERE `login` = :login");
        $query = $db->prepare($sql);
        $query->bindValue(':login', $login);
        $query->execute();

//        получаем данные из базы в переменную
        $dataFromDB = $query->fetch();
        return $dataFromDB;
    }

//    Вносим изменения в БД, полученные из формы редактирования профиля

    public function changeData($password, $name, $surname, $login)
    {
//        подключаемя к БД
        $db = Connection::instance();
        $sql = "UPDATE `users` SET password=?, name=?, surname=? WHERE login=?";
        $query = $db->prepare($sql);
        $query->execute([$password, $name, $surname, $login]);
        if ($query) {

//            при успешном внесении изменений возвращаемся на главную страницу
            header("Location: index.php");
        } else {

//            при возникновении ошибки возвращаем страницу с ошибкой
            $_SESSION['logged'] = 'edit';
            header("Location: error.php");
            return false;
        }
    }
}