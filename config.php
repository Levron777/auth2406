<?php
session_start();
require_once "SignupClass.php";
require_once "SigninClass.php";
require_once "EditClass.php";

define('SERVER', "localhost");
define('USER', "root");
define('PASSWORD', "root");
define('DATABASE', "php");
define('CHARSET', "utf8");

//класс для подключения к БД

class Connection
{
    protected static $instance = null;

    public static function instance() {
        if (self::$instance === null)
        {
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $dsn = 'mysql:host=' . SERVER . ';dbname=' . DATABASE . ';charset=' . CHARSET;
            self::$instance = new PDO($dsn, USER, PASSWORD, $opt);
        }
        return self::$instance;
    }
}

//при нажатии на кнопку, запускаем процесс авторизации

if (isset($_POST['signinButton'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

//    передаем данные в класс авторизации
    $userSignin = new Signin;
    $isUserSignin = $userSignin->entry($login, $password);
}

//при нажатии на кнопку, запускаем процесс регистрации

if (isset($_POST['signupButton'])) {
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    //    передаем данные в класс регистрации
    $userSignup = new Signup($email, $login, $password, $name, $surname);
    $isUserSignup = $userSignup->signup();
}

//    передаем данные в класс редактирования профиля

$editUserInformation = new EditClass;
$loggedUserAllData = $editUserInformation->getData($_SESSION["login"]);

//при нажатии на кнопку, запускаем процесс редактирования профиля

if (isset($_POST['editButton'])) {
    $login = $_SESSION["login"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    //    передаем данные в класс редактирования профиля
    $changeData = new EditClass;
    $changeData->changeData($password, $name, $surname, $login);
}