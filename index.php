<?php
require_once "config.php";
require_once "EditClass.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Ничего, кроме основ: скомпилированный CSS и JavaScript.">

    <title>Test project</title>

    <!-- Bootstrap core CSS -->
    <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="../index.php">Navbar</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto"></ul>
            <form action="Logout.php" method="post">

<!--                При успешной авторизации выводим логин пользователя-->
                <?php
                    if ($_SESSION["login"]) :
                ?>
                    <div class="float-left">
                        <p class="text-light my-2 mr-2"><?=$_SESSION["login"];?></p>
                    </div>
                    <button class="btn btn-info my-2 my-sm-0" name="logoutButton" type="submit">Выйти</button>
                <?php
                    endif;
                ?>
            </form>
        </div>
    </nav>

    <main role="main" class="container">

<!--        При успешной авторизации загружаем главный экран с возможностью редактирования профиля-->
        <?php
            if ($_SESSION["login"]) :
                require_once 'layouts/edit.php';
        ?>

        <div class="editInfo">
            <form action="config.php" method="post" >
                <input type="text" name="editLogin" value="<?=$_SESSION["login"];?>" hidden>
                <h2>Вы успешно авторизовались!</h2>
                <p>Для редактирования профиля нажмите:</p>
                <button class="btn btn-success editFadeIn" type="submit">Редактировать</button>
            </form>
        </div>

<!--        Для неавторизованных пользователей подключаем блоки для авторизации или регистрации    -->
        <?php
            else:
                require_once 'layouts/signin.php';
                require_once 'layouts/signup.php';
            endif;
        ?>

    </main><!-- /.container -->
</body>
</html>