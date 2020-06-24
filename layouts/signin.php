<div class="container mt-4" id="signinContainer">
    <div class="row">
        <div class="col">
            <!-- Форма регистрации -->
            <h2>Авторизация</h2>
            <form method="post" action="config.php">
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required minlength="4" maxlength="12"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль" required minlength="4" maxlength="10"><br>
                <button class="btn btn-success" name="signinButton" type="submit">Войти</button>
            </form>
            <br>
            <p>Если вы не зарегистрированы, тогда пожалуйста <button class="btn btn-success registerFadeIn" type="button">зарегистрируйтесь</button></p>
            <p>Вернуться на <a href="../index.php">главную</a>.</p>
        </div>
    </div>
</div>